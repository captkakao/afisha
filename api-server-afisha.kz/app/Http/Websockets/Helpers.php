<?php

namespace App\Http\Websockets;

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
}
