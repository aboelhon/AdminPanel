<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\MemberMiddleware;
use App\Http\Middleware\SupervisorMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->group(base_path('routes/admin.php'))
                ->group(base_path('routes/supervisor.php'));
        }

    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'AdminMiddleware' => AdminMiddleware::class,
            'SupervisorMiddleware' => SupervisorMiddleware::class,
            'MemberMiddleware' => MemberMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
