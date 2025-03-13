@if (isset($produto_detalhe->id))
    <form method="post" action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('produto-detalhe.store') }}">
        @csrf
@endif
    <input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" placeholder="Id do Produto" class="borda-preta"></input>
    {{ $errors->has('produto_id') ? $errors->first('noproduto_idme') : ''}}
    <input type="text" name="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" placeholder="Comprimento" class="borda-preta"></input>
    {{ $errors->has('comprimento') ? $errors->first('comprimento') : ''}}
    <input type="text" name="largura" value="{{ $produto_detalhe->largura ?? old('largura') }}" placeholder="Largura" class="borda-preta"></input>
    {{ $errors->has('largura') ? $errors->first('largura') : ''}}
    <input type="text" name="altura" value="{{ $produto_detalhe->altura ?? old('altura') }}" placeholder="Altura" class="borda-preta"></input>
    {{ $errors->has('altura') ? $errors->first('altura') : ''}}
    <select name="unidade_id" id="unidade_id" class="form-control @error('unidade_id') is-invalid @enderror">
        <option value="">----- Selecione a unidade -----</option>
        @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}"
                {{ old('unidade_id', $unidades->first()->id ?? '') == $unidade->id ? 'selected' : '' }}>
                {{ $unidade->descricao }}
            </option>
        @endforeach
    </select>
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
