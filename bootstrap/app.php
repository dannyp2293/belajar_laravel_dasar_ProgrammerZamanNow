<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
         // Alias middleware
    $middleware->alias([
        'contoh' => \App\Http\Middleware\ContohMiddleware::class,
    ]);

            // Group
    $middleware->group('Pbb', [
        \App\Http\Middleware\ContohMiddleware::class,
        // middleware lain kalau ada
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
