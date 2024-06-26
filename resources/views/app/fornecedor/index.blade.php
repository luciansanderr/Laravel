<h1>Fornecedor</h1>
{{-- Comentando, descartado--}}
<?= 'Olá'?>
<br>
@php
    //comentando
    echo 'Estou aqui';
@endphp
<br>

{{-- @dd($fornecedores) --}}

@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores. Limite: 10</h3>
@elseif (count($fornecedores) > 10)
    <h3>Existem vários fornecedores. Mais de 10</h3>
@else
    <h3>Não existem fornecedores</h3>
@endif
