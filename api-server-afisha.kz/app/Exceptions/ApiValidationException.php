<?php

namespace App\Exceptions;

use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ApiValidationException extends ValidationException
{
    public function __construct($validator, $response = null, $errorBag = 'default')
    {
        if(!$response){
            $response = response()->json([
                'error_message' => __('validation.validation_error'), // TODO make translation to validation_error
                'error_type' => 'validation',
                'validation_errors' => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        parent::__construct($validator, $response, $errorBag);
    }
}
