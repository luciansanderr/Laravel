@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <p>Fornecedor - Listar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.fornecedor.adicionar') }}" >Novo</a></li>
            <li><a href=" {{ route('app.fornecedor') }} ">Consultar</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        {{ $msg ?? '' }}
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Site</th>
                    <th>UF</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fornecedores as $fornecedor)
                <tr>
                    <td>{{ $fornecedor->nome }}</td>
                    <td>{{ $fornecedor->site }}</td>
                    <td>{{ $fornecedor->uf }}</td>
                    <td>{{ $fornecedor->email }}</td>
                    <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a></td>
                    <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></td>
                </tr>
                <tr>
                    <td colspan="6">
                        <h4>Produtos</h4>
                        <table border="1" width="50%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fornecedor->produtos as $key => $produto)
                                <tr>
                                    <td>{{ $produto->id }}</td>
                                    <td>{{ $produto->nome }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $fornecedores->links() }} --}}
        </div>
    </div>

@endsection
