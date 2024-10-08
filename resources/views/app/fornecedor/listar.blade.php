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
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
        Lista dos Fornecedores
        </div>
    </div>

@endsection