<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Throwable;

class ApiResponseException extends Exception
{
    private string $errorMessage, $errorType;
    private int $statusCode;

    /**
     * @param Throwable|null $previous
     */
    public function __construct($errorMessage = "", $errorType = "", $statusCode = 400, Throwable $previous = null)
    {
        parent::__construct($errorMessage, $statusCode, $previous);
        $this->errorMessage = $errorMessage;
        $this->errorType = $errorType;
        $this->statusCode = $statusCode;
    }


    /**
     * Render the exception into an HTTP response.
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'error_message' => $this->errorMessage,
            'error_type' => $this->errorType
        ], $this->statusCode);
    }
}
