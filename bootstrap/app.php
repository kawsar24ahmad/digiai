<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminOnly::class,
        ]);
        $middleware->redirectUsersTo(fn ($request) =>
            $request->user()->role === 'admin'
                ? route('admin.dashboard')
                : route('dashboard')
        );

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
