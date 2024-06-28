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
    @switch($fornecedores[1]['ddd'])
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
@endisset
