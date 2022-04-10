<?php

namespace App\Http\Websockets;

use App\Exceptions\WsResponseException;
use Ratchet\ConnectionInterface;

class Helpers
{
    public function sendErrorMessage(UserConnection $userConnection, string $message, string $errorType)
    {
        $userConnection->getConnection()->send(json_encode([
            'status' => 'error',
            'message' => $message,
            'error_type' => $errorType,
        ], JSON_UNESCAPED_UNICODE));
    }

    public function sendSuccessMessage(UserConnection $userConnection, string $message = 'ok', array $payload = null)
    {
        $userConnection->getConnection()->send(json_encode([
            'status' => 'success',
            'message' => $message,
            'payload' => $payload,
        ], JSON_UNESCAPED_UNICODE));
    }

    public function sendSuccessMessageToOthers(ConnectionInterface $connection, array $seanceVisitors, array $payload)
    {
        foreach ($seanceVisitors as $resourceId => $visitor) {
            if ($resourceId != $connection->resourceId) {
                $this->helpers->sendSuccessMessage($visitor, 'hall_updated', $payload);
            }
        }
    }

    /**
     * @throws WsResponseException
     */
    public function checkForSeanceExistence(int $seanceId, array $seances)
    {
        if (!array_key_exists($seanceId, $seances)) {
            throw new WsResponseException('No such seance with id: ' . $seanceId, 'no_such_seance');
        }
    }

    /**
     * @throws WsResponseException
     */
    public function checkForVisitorExistence(ConnectionInterface $connection, int $seanceId, array $seanceVisitors)
    {
        $isVisitorFound = false;
        foreach ($seanceVisitors as $resourceId => $visitor) {
            if ($resourceId == $connection->resourceId) {
                $isVisitorFound = true;
                break;
            }
        }

        if (!$isVisitorFound) {
            throw new WsResponseException('You did not joined to the seance with id: ' . $seanceId, 'not_joined_to_seance');
        }
    }
}
