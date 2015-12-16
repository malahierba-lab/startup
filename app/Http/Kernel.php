<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth'                          => \App\Http\Middleware\Authenticate::class,
        'auth.basic'                    => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.strict'                   => \App\Http\Middleware\RedirectIfNotAuthenticated::class,
        'guest'                         => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'request_attemps_limiter'       => \App\Http\Middleware\RequestAttempsLimiter::class,
        'verify.password_reset_token'   => \App\Http\Middleware\VerifyPasswordResetToken::class,
    ];
}
