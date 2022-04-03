<?php

namespace App\Http\Websockets;

use App\Exceptions\WsResponseException;
use App\Models\Seance;
use App\Services\Auth\AuthTokenService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
//                if ($request->command != 'auth' && !$userConnection->getUser()) {
//                    $this->helpers->sendError($userConnection, 'need_auth', 'Authorize before using websocket commands 😘');
//                    return false;
//                }

                switch ($request->command) {
                    // TODO check for token expiration in WS
                    case 'auth':
                        $user = AuthTokenService::checkForAuth($request->payload->auth_token);
                        $userConnection->setUser($user);
                        $this->helpers->sendSuccessMessage($userConnection);
                        break;
                    case 'join_seance':
                        $seanceId = $request->payload->seance_id;
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
                        if (array_key_exists($seanceId, $this->seances)) {
                            $seanceVisitors = $this->seances[$seanceId]['visitors'];
                        } else {
                            throw new WsResponseException('No such seance with id: ' . $seanceId, 'no_such_seance');
                        }

                        $isVisitorFound = false;
                        foreach ($seanceVisitors as $resourceId => $visitor) {
                            if ($resourceId == $conn->resourceId) {
                                $isVisitorFound = true;
                                break;
                            }
                        }


                        if (!$isVisitorFound) {
                            throw new WsResponseException('You did not joined to the seance with id: ' . $seanceId, 'not_joined_to_seance');
                        } else {
                            $editedHallConfig = $request->payload->edited_hall_config;

                            $seance = Seance::findOrFail($seanceId);
                            $seance->hall_config = json_encode($editedHallConfig, true);
                            $seance->save();

                            $this->seances[$seanceId]['hall_config'] = $seance->hall_config;
                            $this->helpers->sendSuccessMessage($userConnection);

                            $payload = [
                                'hall_config' => $this->seances[$seanceId]['hall_config'],
                            ];
                            foreach ($seanceVisitors as $resourceId => $visitor) {
                                if ($resourceId != $conn->resourceId) {
                                    $this->helpers->sendSuccessMessage($visitor, 'hall_updated', $payload);
                                }
                            }
                        }

                        break;
                    case 'test':
                        $this->helpers->sendSuccessMessage($userConnection, 'test command works perfectly 😘');
                        break;
                    default:
                        $example = [
                            'methods' => [
                                'join_room' => [
                                    'command' => 'join_room',
                                    'room_id' => 'DSEYrbLMDtGnttb6SQiQzATxuzaKSKRp8f',
                                ],
                                'send_message' => [
                                    'command' => 'send_message',
                                    'room_id' => 'DSEYrbLMDtGnttb6SQiQzATxuzaKSKRp8f',
                                    'message' => 'qweqwe',
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
        // The connection is closed, remove from connection list
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}
