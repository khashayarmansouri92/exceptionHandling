<?php

namespace App\Exceptions;

use App\Services\Error\ErrorServiceInterface;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Auth;
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


    public function render($request, Throwable $exception)
    {
        $errorService = app()->make(ErrorServiceInterface::class);

        //***In the line below, references have been made to several Exceptions, for each of which, separate conditions and custom blades can be considered.***"
        //HttpException: This exception can have various status codes, such as 404 (Not Found) or 500 (Internal Server Error) depending on the specific HTTP error.
        //ModelNotFoundException: This exception is often associated with a 404 (Not Found) status code since it indicates that the requested resource (model) was not found.
        //ValidationException: This exception is typically associated with a 422 (Unprocessable Entity) status code, indicating that the server understands the content of the request, but it cannot process the validation rules.
        //AuthenticationException: This exception may not have a specific status code, but it often results in a redirect to the login page or a 401 (Unauthorized) status code.
        //AuthorizationException: Similar to AuthenticationException, this exception may not have a specific status code, but it often leads to a 403 (Forbidden) status code.
        //MethodNotAllowedHttpException: This exception is generally associated with a 405 (Method Not Allowed) status code, indicating that the requested HTTP method is not supported for the given URL.
        //TokenMismatchException: This exception is typically associated with a 419 (Authentication Timeout) status code, indicating that the CSRF token validation failed.
        //QueryException: This exception is an application-specific error and may not have a fixed status code. It could lead to a 500 (Internal Server Error) or a custom error code, depending on the situation.
        //PDOException: This exception is not specifically related to HTTP status codes, as it deals with database-related errors.
        //Throwable: Since Throwable is the base class for all PHP exceptions, it doesn't have a specific status code. Its subclasses (e.g., HttpException, QueryException) may have associated status codes.

        $error = $errorService->store([
            'user_id' => Auth::check() ? Auth::user()->id : null,
            'data' => json_encode([
                'message' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'backtrace' => $exception->getTrace()
            ])
        ]);

//        if (Auth::check() && Auth::user()->is_admin)
//            return parent::render($request, $exception);

        $message = $exception->getMessage();
        $number = $error->error_number;
        return response()->view('errors.custom', compact('message', 'number'));
    }
}
