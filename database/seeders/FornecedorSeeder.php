<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //instanciando o objeto
        // $fornecedor = new Fornecedor();
        // $fornecedor->nome = 'Casa da Farinha Nova';
        // $fornecedor->uf = 'MA';
        // $fornecedor->email = 'casadafarinha@gmail.com';
        // $fornecedor->site = 'casadafarinha.com.br';
        // $fornecedor->save();

        // // este método deve ter atenção fillable na model
        // Fornecedor::create([
        //     'nome' => 'Fornecedor Nova Onda',
        //     'uf' => 'PA',
        //     'email'=> 'novaonda@gmail.com',
        //     'site' => 'novaonda.com.br'
        // ]);

        //insert
        //não está funcionando nesta vers
        // DB::table('fornecedores')->insert([
        //     'nome' => 'Forncedor teste',
        //     'uf' => 'MG',
        //     'email' => 'direto.com.br',
        //     'site' => 'site.com.br'
        // ]);
        \App\Models\Fornecedor::factory()->count(50)->create();
    }
}
