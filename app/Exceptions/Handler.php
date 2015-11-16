<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
        ModelNotFoundException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        // If the request wants JSON or it's AJAX
        // solution taken from http://stackoverflow.com/questions/28944097/laravel-5-handle-exceptions-when-request-wants-json
        if ($request->ajax() || $request->wantsJson()) {
            // set some common error text
            $response = ['errors' => 'Sorry, something went wrong'];

            // If the app is in debug mode, add the exception class name, message and stack trace to response
            if (config('app.debug')) {
                $response['exception'] = get_class($e);
                $response['message']   = $e->getMessage();
                $response['trace']     = $e->getTrace();
            }

            // If this exception is an instance of HttpException, grab the HTTP status code from it.
            // otherwise set default value
            $status = ($this->isHttpException($e)) ? $e->getStatusCode() : 400;

            // Return a JSON response with the response array and status code
            return response()->json($response, $status);
        }

        if ($e instanceof ModelNotFoundException) {
            $e = new NotFoundHttpException($e->getMessage(), $e);
        }

        return parent::render($request, $e);
    }
}
