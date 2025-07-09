@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <p>Listagem de Clientes</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('cliente.create') }}">Novo</a></li>
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
                    <th>Nome</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id])}} ">Visualizador</a></td>
                    {{-- Para deletar --}}
                    <td>
                        <form action="{{ route('cliente.destroy', ['cliente' => $cliente->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button stype="submit">Excluir</button>
                        </form>
                    </td>
                    <td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id])}}">Editar</a></td>
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
        Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }} encontrados.
        </div>
    </div>

@endsection
