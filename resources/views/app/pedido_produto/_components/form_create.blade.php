
<form method="post" action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}">
    @csrf
    <select name="produto_id">
        <option value="">----- Selecione um Produto -----</option>
        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}" {{ (old('produto_id', $registro->produto_id ?? '') == $produto->id) ? 'selected' : '' }}>
                {{ $produto->nome }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('produto_id'))
        <div>{{ $errors->first('produto_id') }}</div>
    @endif

    <input type="number" name="quantidade" value="{{ old('quantidade') }}" placeholder="Quantidade">
    {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}

    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
