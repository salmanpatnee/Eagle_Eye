<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Psr\Log\LogLevel;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<Throwable>, LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        // HttpExceptions with 5xx status are suppressed from report() by parent — log them explicitly
        if ($e instanceof HttpException && $e->getStatusCode() >= 500) {
            Log::error($e->getMessage(), ['exception' => $e]);
        }

        if ($e instanceof ValidationException) {
            return parent::render($request, $e);
        }

        if (! config('app.debug') && ! $request->expectsJson()) {
            $status = $this->isHttpException($e) ? $e->getStatusCode() : 500;
            $view = "errors.{$status}";

            if (! view()->exists($view)) {
                $view = 'errors.500';
            }

            return response()->view($view, [], $status);
        }

        return parent::render($request, $e);
    }
}
