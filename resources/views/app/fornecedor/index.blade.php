<h3>Fornecedores</h3>
@isset($fornecedores)
    Nome: {{ $fornecedores[0]['nome'] ?? '' }}
    <br>
    {{--mesmo que um if (unless)--}}
    @unless ($fornecedores[0]['status'] == 'S')
    Status: {{$fornecedores[0]['status'] ?? ''}}
    @endunless
    <br>
    Cnpj: {{ $fornecedores[0]['cnpj'] ?? '' }}
    <br>
    Telefone: {{ $fornecedores[1]['ddd'] ?? '' }} {{ $fornecedores[0]['telefone'] ?? ''}}
    <br>
    @switch($fornecedores[8]['ddd'] ?? '')
        @case(11)
            São Paulo - SP
            @break
        @case(32)
            Juiz de Fora - MG
            @break
        @case(85)
            Fortaleza - CE
        @break
        @default
        Nem um dos DD selecionados.
    @endswitch
    <br>
@endisset
<hr>
Utilizando For
<br>
@isset($fornecedores)
    @for ($i = 0; isset($fornecedores[$i]); $i++)
        Nome: {{ $fornecedores[$i]['nome'] ?? '' }}
        <br>
        Status: {{$fornecedores[$i]['status'] ?? ''}}
        <br>
        Cnpj: {{ $fornecedores[$i]['cnpj'] ?? '' }}
        <br>
        Telefone: {{ $fornecedores[$i]['ddd'] ?? '' }} - {{ $fornecedores[$i]['telefone'] ?? ''}}
        <hr>
    @endfor
@endisset
Utilizando While
<br>
@isset($fornecedores)
    <?php $i = 0 ?>
    @while (isset($fornecedores[$i]))
        Nome: {{ $fornecedores[$i]['nome'] ?? '' }}
        <br>
        Status: {{$fornecedores[$i]['status'] ?? ''}}
        <br>
        Cnpj: {{ $fornecedores[$i]['cnpj'] ?? '' }}
        <br>
        Telefone: {{ $fornecedores[$i]['ddd'] ?? '' }} - {{ $fornecedores[$i]['telefone'] ?? ''}}
        <hr>
    <?php $i++ ?>
    @endwhile
@endisset
<hr>
Utilizando Foreach
<hr>

@isset($fornecedores)
    @foreach ($fornecedores as $indece => $fornecedor)
        Nome: {{ $fornecedor['nome'] ?? '' }}
        <br>
        Status: {{$fornecedor['status'] ?? ''}}
        <br>
        Cnpj: {{ $fornecedor['cnpj'] ?? '' }}
        <br>
        Telefone: {{ $fornecedor['ddd'] ?? '' }} - {{ $fornecedor['telefone'] ?? ''}}
        <hr>
    @endforeach
@endisset

<hr>
<br>
Utlizando Forelse
<hr>
<br>
@isset($fornecedores)
    @forelse ($fornecedores as $indece => $fornecedor)
        Nome: {{ $fornecedor['nome'] ?? '' }}
        <br>
        Status: {{$fornecedor['status'] ?? ''}}
        <br>
        Cnpj: {{ $fornecedor['cnpj'] ?? '' }}
        <br>
        Telefone: {{ $fornecedor['ddd'] ?? '' }} - {{ $fornecedor['telefone'] ?? ''}}
        <hr>
    @empty
    Não passou nada por aqui.
    @endforelse
@endisset
