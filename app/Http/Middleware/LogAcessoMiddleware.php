<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //return $next($request);
        //LogAcesso::create(['log' => 'Ip xyz requisitou a rota abcd']);
        //return Response('Paramos a requisição no middleware');
        //dd($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "Ip $ip requisitou a rota $rota"]);
        //Deixando passar para frente
        return $next($request);
        //return Response('Paramos a requisição no middleware');
    }
}
