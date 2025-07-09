@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <p>Pedido - Adicionar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            <li><a href="">Consultar</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        {{ $msg ?? '' }}
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            @component("app.pedido._component.form_create_edit_pedido", ['clientes' => $clientes])
            @endcomponent
            </form>
        </div>
    </div>

@endsection
