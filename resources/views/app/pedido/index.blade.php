@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <p>Listagem de Pedido</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.create') }}">Novo</a></li>
            <li><a href="">Consultar</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        @if (session('success'))
                {{ session('success') }}
        @endif
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>Id Pedido</th>
                    <th>Cliente</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->cliente_id }}</td>
                    <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id])}} ">Visualizador</a></td>
                    {{-- Para deletar --}}
                    <td>
                        <form action="{{ route('pedido.destroy', ['pedido' => $pedido->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button stype="submit">Excluir</button>
                        </form>
                    </td>
                    <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id])}}">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $fornecedores->links() }} --}}
        {{-- {{ $clientes->appends($request)->links() }}
        {{ $clientes->count() }} - Total de registros por página <br>
        {{ $clientes->total() }} - Total de registros encontrados <br>
        {{ $clientes->firstItem() }} - Primeiro registro da página <br>
        {{ $clientes->lastItem() }} - Último registro da página <br> --}}
        <br>
        Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }} encontrados.
        </div>
    </div>

@endsection
