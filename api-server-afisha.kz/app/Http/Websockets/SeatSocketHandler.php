<?php

namespace App\Http\Websockets;

use App\Exceptions\WsResponseException;
use App\Models\Seance;
use App\Services\Auth\AuthTokenService;
use Illuminate\Support\Facades\Log;
use Ratchet\ConnectionInterface;
use Ratchet\WebSocket\MessageComponentInterface;

class SeatSocketHandler implements MessageComponentInterface
{
    private array $userConnections;

    private array $seances;
    private Helpers $helpers;

    public function __construct()
    {
        $this->userConnections = [];
        $this->seances = [];
        $this->helpers = new Helpers();
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $conn->socketId = sprintf('%d.%d', random_int(1, 1000000000), random_int(1, 1000000000));
        $conn->app = (object)config('websockets.apps.0');

        $this->userConnections[$conn->resourceId] = new UserConnection($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $conn, $msg)
    {
        try {
            $userConnection = $this->userConnections[$conn->resourceId];
            $request = json_decode($msg);

            if (isset($request->command)) {
                if ($request->command != 'auth' && !$userConnection->getUser()) {
                    $this->helpers->sendErrorMessage($userConnection, 'Authorize before using websocket commands 😘', 'need_auth');
                    return false;
                }

                switch ($request->command) {
                    // TODO check for token expiration in WS
                    case 'auth':
                        $user = AuthTokenService::checkForAuth($request->payload->auth_token);
                        $userConnection->setUser($user);
                        $this->helpers->sendSuccessMessage($userConnection);
                        break;
                    case 'join_seance':
                        $seanceId = $request->payload->seance_id;
                        $userConnection->setSeanceId($seanceId);

                        if (array_key_exists($seanceId, $this->seances)) {
                            $this->seances[$seanceId]['visitors'][$conn->resourceId] = $userConnection;
                        } else {
                            $seance = Seance::findOrFail($seanceId);
                            $this->seances[$seanceId]['hall_config'] = json_decode($seance->hall_config, true);
                            $this->seances[$seanceId]['visitors'][$conn->resourceId] = $userConnection;
                        }
                        $payload = [
                            'hall_config' => $this->seances[$seanceId]['hall_config'],
                        ];
                        $this->helpers->sendSuccessMessage($userConnection, payload: $payload);
                        break;
                    case 'book_seat':
                        $seanceId = $request->payload->seance_id;

                        $this->helpers->checkForSeanceExistence($seanceId, $this->seances);
                        $this->helpers->checkForVisitorExistence($conn, $seanceId, $this->seances[$seanceId]['visitors']);

                        $rowNumber = $request->payload->row_number;
                        $colNumber = $request->payload->col_number;
                        $rowsAndColumns = $this->seances[$seanceId]['hall_config']['seating_area']['rows'];

                        list($rowIdx, $colIdx) = $this->helpers->getIndexesOfSeat($rowNumber, $colNumber, $rowsAndColumns);

                        $this->helpers->checkIfSeatIsTaken($this->seances, $seanceId, $rowIdx, $colIdx);
                        $this->seances[$seanceId]['hall_config']['seating_area']['rows'][$rowIdx]['seats'][$colIdx]['is_taken'] = true;

                        $seance = Seance::findOrFail($seanceId);
                        $seance->hall_config = json_encode($this->seances[$seanceId]['hall_config'], true);
                        $seance->save();

                        $userConnection->addUnpaidSeatNumbers($rowNumber, $colNumber);

                        $this->helpers->sendSuccessMessage($userConnection, payload: $userConnection->getUnpaidSeatNumbers());

                        $payload = [
                            'hall_config' => $this->seances[$seanceId]['hall_config'],
                        ];
                        $this->helpers->sendSuccessMessageToOthers($conn, $this->seances[$seanceId]['visitors'], $payload);

                        break;
                    case 'unbook_seat':
                        $seanceId = $request->payload->seance_id;

                        $this->helpers->checkForSeanceExistence($seanceId, $this->seances);
                        $this->helpers->checkForVisitorExistence($conn, $seanceId, $this->seances[$seanceId]['visitors']);

                        $rowNumber = $request->payload->row_number;
                        $colNumber = $request->payload->col_number;
                        $rowsAndColumns = $this->seances[$seanceId]['hall_config']['seating_area']['rows'];

                        list($rowIdx, $colIdx) = $this->helpers->getIndexesOfSeat($rowNumber, $colNumber, $rowsAndColumns);

                        $this->seances[$seanceId]['hall_config']['seating_area']['rows'][$rowIdx]['seats'][$colIdx]['is_taken'] = false;

                        $seance = Seance::findOrFail($seanceId);
                        $seance->hall_config = json_encode($this->seances[$seanceId]['hall_config'], true);
                        $seance->save();

                        $userConnection->removeUnpaidSeatNumbers($rowNumber, $colNumber);

                        $this->helpers->sendSuccessMessage($userConnection, payload: $userConnection->getUnpaidSeatNumbers());

                        $payload = [
                            'hall_config' => $this->seances[$seanceId]['hall_config'],
                        ];
                        $this->helpers->sendSuccessMessageToOthers($conn, $this->seances[$seanceId]['visitors'], $payload);

                        break;
                    case 'test':
                        $this->helpers->sendSuccessMessage($userConnection, 'test command works perfectly 😘');
                        break;
                    default:
                        $example = [
                            'commands' => [
                                'test' => [
                                    'command' => 'test',
                                ],
                                'auth' => [
                                    'command' => 'auth',
                                    'payload' => [
                                        'auth_token' => 'DJNtrXOvyEdeFjG516iGxpEiClxFBWpPrw5lScev',
                                    ],
                                ],
                                'join_seance' => [
                                    'command' => 'join_seance',
                                    'payload' => [
                                        'seance_id' => 2,
                                    ],
                                ],
                                'book_seat' => [
                                    'command' => 'book_seat',
                                    'payload' => [
                                        'seance_id' => 2,
                                        'row_number' => 2,
                                        'col_number' => 1,
                                    ],
                                ],
                                'unbook_seat' => [
                                    'command' => 'unbook_seat',
                                    'payload' => [
                                        'seance_id' => 2,
                                        'row_number' => 2,
                                        'col_number' => 1,
                                    ],
                                ],
                            ],
                        ];
                        $conn->send(json_encode($example));
                }
            }
        } catch (WsResponseException $exception) {
            $this->helpers->sendErrorMessage($userConnection, $exception->getMessage(), $exception->getErrorType());
        } catch (\Throwable $exception) {
            Log::error($exception->getMessage(), [
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);
            $this->helpers->sendErrorMessage($userConnection, 'Something went wrong', 'pizdec');
        }

    }

    public function onClose(ConnectionInterface $conn)
    {
        $userConnection = $this->userConnections[$conn->resourceId];

        $unpaidSeatNumbers = $userConnection->getUnpaidSeatNumbers();
        $seanceId = $userConnection->getSeanceId();
        $rowsAndColumns = $this->seances[$seanceId]['hall_config']['seating_area']['rows'];

        foreach ($unpaidSeatNumbers as $unpaidSeatNumber) {
            list($rowIdx, $colIdx) = $this->helpers->getIndexesOfSeat($unpaidSeatNumber['row_number'], $unpaidSeatNumber['col_number'], $rowsAndColumns);

            $this->seances[$seanceId]['hall_config']['seating_area']['rows'][$rowIdx]['seats'][$colIdx]['is_taken'] = false;
        }

        $seance = Seance::findOrFail($seanceId);
        $seance->hall_config = json_encode($this->seances[$seanceId]['hall_config'], true);
        $seance->save();

        unset($this->seances[$seanceId]['visitors'][$conn->resourceId]);
        unset($this->userConnections[$conn->resourceId]);

        $payload = [
            'hall_config' => $this->seances[$seanceId]['hall_config'],
        ];
        $this->helpers->sendSuccessMessageToOthers($conn, $this->seances[$seanceId]['visitors'], $payload);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $exception)
    {
        Log::error($exception->getMessage(), [
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
        ]);
        echo "An error has occurred: {$exception->getMessage()}\n";
        $conn->close();
    }
}
