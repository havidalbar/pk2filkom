<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($this->isHttpException($exception)) {
            switch ($exception->getStatusCode()) {
                // not authorized
                case '403':
                    return \Response::view('v_mahasiswa.error.403', array(), 403);

                // not found
                case '404':
                    return \Response::view('v_mahasiswa.error.404', array(), 404);

                // down
                case '503':
                    return \Response::view('v_mahasiswa.error.503', array(), 503);

                // internal error
                default:
                case '500':
                    return \Response::view('v_mahasiswa.error.500', array(), $exception->getStatusCode());
            }
        } else {
            return parent::render($request, $exception);
        }
    }
}
