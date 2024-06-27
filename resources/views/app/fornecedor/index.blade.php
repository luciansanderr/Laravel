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

<hr>
<h3>Utilização do unless</h3>
@isset($fornecedores)
Fornecedor: {{$fornecedores[0]['nome']}}
<br>
Status: {{$fornecedores[0]['status']}}
<br>
{{-- @if (!($fornecedores[0]['status'] == 'S'))
    Fornecedor Inativo
@endif --}}
<br>
@unless ($fornecedores[0]['status'] == 'S')
    Fornecedor Inativo
@endunless
<br>
@isset($fornecedores[0]['cnpj'])
    Cnpj: {{$fornecedores[0]['cnpj']}}
@endisset
<br>
@empty($fornecedores[1]['cnpj'])
    Vazio
@endempty
@endisset
