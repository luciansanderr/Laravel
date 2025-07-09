@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <p>Cliente - Adicionar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
            <li><a href="">Consultar</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        {{ $msg ?? '' }}
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            @component("app.cliente._component.form_create_edit_cliente", [])
            @endcomponent
            </form>
        </div>
    </div>

@endsection
