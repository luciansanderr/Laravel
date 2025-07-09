@if (isset($pedido->id))
    <form method="post" action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('pedido.store') }}">
        @csrf
@endif
    <input type="text" name="nome" value="{{ $pedido->nome ?? old('nome') }}" placeholder="Pedido" class="borda-preta"></input>
    {{ $errors->has('nome') ? $errors->first('nome') : ''}}

    <select name="cliente_id">
        <option>----- Selecione um Cliente -----</option>
        @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ ($produto->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
        @endforeach
    {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}
    </select>

    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
