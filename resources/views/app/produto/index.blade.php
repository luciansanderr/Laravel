@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <p>Produto</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('produto.create') }}">Novo</a></li>
            <li><a href="">Consultar</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        {{ $msg ?? '' }}
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descricao</th>
                    <th>Peso</th>
                    <th>Fornecedor</th>
                    <th>Site Fornecedor</th>
                    <th>Unidade_Id</th>
                    <th>Comprimento</th>
                    <th>Largura</th>
                    <th>Altura</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->peso }}</td>
                    <td>{{ $produto->fornecedor->nome }}</td>
                    <td>{{ $produto->fornecedor->site }}</td>
                    <td>{{ $produto->unidade_id }}</td>
                    <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                    <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                    <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                    <td><a href="{{ route('produto.show', ['produto' => $produto->id])}} ">Visualizador</a></td>
                    {{-- Para deletar --}}
                    <td>
                        <form action="{{ route('produto.destroy', ['produto' => $produto->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button stype="submit">Excluir</button>
                        </form>
                    </td>
                    <td><a href="{{ route('produto.edit', ['produto' => $produto->id])}}">Editar</a></td>
                </tr>

                <tr>
                    <td colspan="12">
                        <p>Pedidos</p>
                        @foreach ($produto->pedidos as $pedido)
                            <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                                Pedido: {{ $pedido->id }}</a>,
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $fornecedores->links() }} --}}
        </div>
    </div>

@endsection
