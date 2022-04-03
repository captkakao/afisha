<?php

namespace App\Http\Websockets;

use App\Models\Seance;
use App\Services\Auth\AuthTokenService;
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
                            $this->seances[$seanceId]['visitors'][] = $userConnection;
                        } else {
                            $seance = Seance::findOrFail($seanceId);
                            if ($seance) {
                                $this->seances[$seanceId]['hall_config'] = $seance->hall_config;
                                $this->seances[$seanceId]['visitors'][] = $userConnection;
                            }
                        }
                        $this->helpers->sendSuccessMessage($userConnection);
                        break;
                    case 'book_seat':

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
        } catch (ModelNotFoundException $exception) {
            $this->helpers->sendErrorMessage($userConnection, $exception->getMessage(), 'no_such_seance');
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
