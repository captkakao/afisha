<?php

namespace App\Http\Websockets;

use Ratchet\ConnectionInterface;

class Helpers
{
    public function sendError(UserConnection $userConnection, string $errorType, string $errorMessage)
    {

        $userConnection->getConnection()->send(json_encode([
            'status' => 'error',
            'error_type' => $errorType,
            'error_message' => $errorMessage,
        ], JSON_UNESCAPED_UNICODE));
    }

    public function sendMessage(UserConnection $userConnection, string $message)
    {
        $userConnection->getConnection()->send(json_encode([
            'message' => $message,
        ], JSON_UNESCAPED_UNICODE));
    }
}
