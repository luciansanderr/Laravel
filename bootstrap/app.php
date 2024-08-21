<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\LogAcessoMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // //$middleware->append(LogAcessoMiddleware::class);
        $middleware->use([
            // \Illuminate\Http\Middleware\TrustHosts::class,
            \Illuminate\Http\Middleware\TrustProxies::class,
            \Illuminate\Http\Middleware\HandleCors::class,
            \Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance::class,
            \Illuminate\Http\Middleware\ValidatePostSize::class,
            \Illuminate\Foundation\Http\Middleware\TrimStrings::class,
            \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
            'log.acesso' => \App\Http\Middleware\LogAcessoMiddleware::class,
            'autenticacao' => \App\Http\Middleware\AutenticacaoMiddleware::class
        ]);
        // $middleware->group('web', [
        //     \Illuminate\Cookie\Middleware\EncryptCookies::class,
        //     \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        //     \Illuminate\Session\Middleware\StartSession::class,
        //     \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        //     \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
        //     \Illuminate\Routing\Middleware\SubstituteBindings::class,
        //     // \Illuminate\Session\Middleware\AuthenticateSession::class,
        //     \App\Http\Middleware\LogAcessoMiddleware::class,
        //     'log.acesso' => \App\Http\Middleware\LogAcessoMiddleware::class,
        //     'autenticacao' => \App\Http\Middleware\AutenticacaoMiddleware::class,
        // ]);
        //group apelido middleware
        // $middleware->appendToGroup('log-acesso', [
        //     \App\Http\Middleware\LogAcessoMiddleware::class
        // ]);
        // $middleware->appendToGroup('permissao', [
        //     \App\Http\Middleware\AutenticacaoMiddleware::class
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
