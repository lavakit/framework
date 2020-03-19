<?php

namespace Lavakit\Base\Exceptions;

use App\Exceptions\Handler as ExceptionHandler;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use ThemeFrontend;
use ThemeBackend;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class Handler
 * @package Lavakit\Base\Exceptions
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
            AuthorizationException::class,
            HttpException::class,
            ModelNotFoundException::class,
            TokenMismatchException::class,
            ValidationException::class
    ];

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Exception $ex
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $ex)
    {
        if (!config('app.debug')) {
            if ($ex instanceof ModelNotFoundException) {
                $ex = new NotFoundHttpException($ex->getMessage(), $ex);
            }

            if ($ex instanceof NotFoundHttpException) {
                $ex = new NotFoundHttpException($ex->getMessage(), $ex);
            }

            if ($this->isHttpException($ex)) {
                switch ($ex->getStatusCode()) {
                    case 404:
                        if ($request->is(locale() . '/' . config('base.base.admin-prefix') . '/*')) {
                            ThemeBackend::set(config('theme.theme.active_backend'));
                            return response()->view('errors.404', [], 404);
                        }

                        ThemeFrontend::set(config('theme.theme.active'));
                        return response()->view('errors.404', [], 404);

                    case 500:
                    case 503:
                        if ($request->is(locale() . '/' . config('base.base.admin-prefix') . '/*')) {
                            ThemeBackend::set(config('theme.theme.active_backend'));
                            return response()->view('errors.500', [], 500);
                        }

                        ThemeFrontend::set(config('theme.theme.active'));
                        return response()->view('errors.500', [], 500);
                }
            }
        }

        return parent::render($request, $ex);
    }
}
