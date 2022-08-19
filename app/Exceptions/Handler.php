<?php

namespace App\Exceptions;

use App\Traits\APIResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use Illuminate\Validation\ValidationException;


class Handler extends ExceptionHandler
{
    use APIResponse;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
//        $this->reportable(function (Throwable $e) {
//            //
//        });

        $this->renderable(function (\Exception $e, $request) {
            if($request->is('api/*')) {

                // TODO Test
                if($e instanceOf ValidationException)
                {
                    $keyMsgError = array_keys($e->validator->errors()->messages())[0];
                    $msg = $e->validator->errors()->messages()[$keyMsgError][0];
                    return $this->sendError($msg, null,422);
                }

                if($e instanceOf NotFoundHttpException)
                {
                    return $this->sendError('general message record or route not found.', null,404);
                }

            }
        });


    }
}
