<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        /*
            get status code and status message
        */
        $internalError = Response::HTTP_INTERNAL_SERVER_ERROR;
        $statusCode = $e->getCode();
        $details = [
            'message' => $e->getMessage()
        ];


        if ($e instanceof ProductException) {
            $statusCode = $e->getStatus();
            $details['message'] = $e->getStatusMessage();
            $internalError = $e->getHttpSatusCode();
        }

        if ($e instanceof UserException) {
            $statusCode = $e->getStatus();
            $details = $e->getStatusMessage();
            $internalError = $e->getHttpStatusCode();
        }
        $data = [
            'status' => $statusCode,
            'error' => $details
        ];

        return response()->json($data, $internalError);
    }


}
