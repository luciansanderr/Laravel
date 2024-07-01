<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href={{ asset('css/css_basico.css') }}>
    </head>

    <body>
        @include('site.layouts._partials.cabecalho')
        @yield('conteudo')
    </body>
</html>
