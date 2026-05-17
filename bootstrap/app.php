<?php

use Illuminate\Auth\Access\AuthorizationException;
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

        //

    })

    ->withExceptions(function (Exceptions $exceptions): void {

        $exceptions->render(function (
            AuthorizationException $e,
            $request
        ) {

            return response()->view(
                'errors.403',
                [
                    'message' => 'You do not have permission to access this page.',
                ],
                403
            );

        });

    })

    ->create();