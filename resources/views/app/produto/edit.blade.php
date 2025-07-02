@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <p>Produto - Editar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('produto.index') }}">Voltar</a></li>
            <li><a href="">Consultar</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        {{ $msg ?? '' }}
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <form method="post" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
                @csrf
                {{-- todos os atributs serão afetados --}}
                @method('PUT')
                <select name="fornecedor_id">
                    <option>----- Selecione um fornecedor -----</option>
                    @foreach ($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}" {{ ($unidade->id ?? old('fornecedor')) == $fornecedor->id ? 'selected' : '' }}>{{ $fornecedor->nome }}</option>
                    @endforeach
                {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}
                </select>
                <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta"></input>
                {{ $errors->has('nome') ? $errors->first('nome') : ''}}
                <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descricão" class="borda-preta"></input>
                {{ $errors->has('descricao') ? $errors->first('descricao') : ''}}
                <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="peso" class="borda-preta"></input>
                {{ $errors->has('peso') ? $errors->first('peso') : ''}}
                <select name="unidade_id">
                        <option value="0">----- Selecione a unidade -----</option>
                    @foreach ($unidades as $unidade)
                        <option value="{{ $unidade->id }}" {{ ($unidade->id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
                    @endforeach
                {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
                </select>
                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
        </div>
    </div>

@endsection
