<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Throwable;

class WsResponseException extends Exception
{
    private string $errorMessage, $errorType;

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

    public function getErrorType()
    {
        return $this->errorType;
    }
}
