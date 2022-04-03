<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        ApiResponseException::class,
        ApiValidationException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (NotFoundHttpException $e, $request) {
            return response()->json([
                'error_message' => 'Record not found.',
                'error_type' => 'not_found',
            ], Response::HTTP_NOT_FOUND);
        });
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof ValidationException) {
            $e = new ApiValidationException($e->validator, $e->response, $e->errorBag);
        }

        return parent::render($request, $e);
    }
}
