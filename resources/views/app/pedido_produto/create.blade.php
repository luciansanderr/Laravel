@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')
    <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <p>Adicionar Produtos ao Pedido</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            <li><a href="">Consultar</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        {{ $msg ?? '' }}
            <h4>Detalhes do pedido</h4>
            <p>Id do Pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>
            <h4>Apresentar os items do pedido</h4>
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <h4>Items Do Pedido</h4>
                    <table style="border: solid 1px; width: 100%;">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @component("app.pedido_produto._components.form_create", ['pedido' => $pedido, 'produtos' => $produtos])
            @endcomponent
        </div>
    </div>

@endsection
