@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <p>Produto Detalhe - Editar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('produto.index') }}">Voltar</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">

        <h4>Produto</h4>
        <p>Nome: {{ $produto_detalhe->produto->nome }}</p>
        <p>Descrição: {{ $produto_detalhe->produto->descricao }}</p>

        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <h4>Detalhe do Produto</h4>
            @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades])
            @endcomponent
        </div>
    </div>

@endsection
