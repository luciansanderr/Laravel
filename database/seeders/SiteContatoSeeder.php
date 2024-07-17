<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contato = new SiteContato;
        $contato->nome = 'Testando mais uma vez';
        $contato->telefone = '(98) 99996-3265';
        $contato->email = 'maisumavez@gmail.com';
        $contato->motivo_contato = 2;
        $contato->mensagem = 'Estou testando mais uma vez';
        $contato->save();

        SiteContato::create([
            'nome' => 'Sobre o sistema',
            'telefone' => '(98) 98596-3265',
            'email' => 'sobre@gmail.com',
            'motivo_contato' => 1,
            'mensagem' => 'Estou aqui respondendo os erros',
        ]);
    }
}
