<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index () {

        $fornecedores = [
        0 => [
            'nome'=>'Fornecedor 1',
            'status' => 'N',
            'cnpj' => '00.000.000/000-00',
            'ddd' => '11', // São Paulo - SP
            'telefone' => '85966352'
        ],
        1 => [
            'nome'=>'Fornecedor 2',
            'status' => 'N',
            'cnpj' => '00.000.000/000-00',
            'ddd' => '32', // Juiz de Fora - MG
            'telefone' => '85966352'
        ],
        2 => [
            'nome'=>'Fornecedor 3',
            'status' => 'N',
            'cnpj' => '00.000.000/000-00',
            'ddd' => '85', // Fortaleza - CE
            'telefone' => '85966352'
        ]
        ];

        //subscrevendo para testar o forelse
        //$fornecedores = [];

        // $msg = isset($fornecedores[1]['cnpj']) ? 'Cnpj Informado' : 'Cnpj não informado';
        // echo $msg;

        return view('app.fornecedor.index', compact('fornecedores'));
    }

    public function salvar(Request $Request) {
        Fornecedor::create($Request->all());
        return view('app.fornecedor');
    }
}
