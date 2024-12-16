<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        return view("app.fornecedor.index");
    }

    public function listar(Request $request)
    {
        //listando os fornecedores
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->get();
        return view("app.fornecedor.listar", ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request)
    {

        $msg = '';

        //inclusão
        if(!empty($request->input("_token") && empty($request->input('id')))) {
            //regras da validação
            $regras = [
                'nome' => 'required|min:3|max:50',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
            //resposta da validação
            $feedback = [
                'required' => 'Campo obrigatório',
                'nome.min' => 'Quatidade mínima de caracter',
                'nome.max' => 'Quantidade máxima de caracter',
                'uf.min' => 'Quatidade mínima de caracter',
                'uf.max' => 'Quantidade máxima de caracter',
                'email.email' => 'Precisa de uma email válido'
            ];

            //validação
            $request->validate($regras, $feedback);

            //chamando o método e inserindo na tabela
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            //echo "Chegamos até aqui";
            $msg = 'Cadastro realizado com sucesso!';
        }

        //edição
        if(!empty($request->input("_token") && !empty($request->input('id')))) {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg = "Atualização com Sucesso";
            } else {
                $msg = "Atualização com Falha";
            }

            return redirect()->route("app.fornecedor.editar", ["id" => $request->input('id'), "msg" => $msg]);
        }

        //print_r ($request->all());
        return view("app.fornecedor.adicionar", ["msg" => $msg]);
    }

    public function editar($id, $msg = '')
    {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id)
    {
        $delete = Fornecedor::find($id)->delete();
        //de fato remover o registro
        //Fornecedor::find($id)->softDelete();
        if ($delete) {
            $msg = "Deletado com Sucesso";
        } else {
            $msg = "Falha ao deletar";
        }

        return redirect()->route('app.fornecedor.listar', ['msg' => $msg]);
    }

    // public function index () {

    //     $fornecedores = [
    //     0 => [
    //         'nome'=>'Fornecedor 1',
    //         'status' => 'N',
    //         'cnpj' => '00.000.000/000-00',
    //         'ddd' => '11', // São Paulo - SP
    //         'telefone' => '85966352'
    //     ],
    //     1 => [
    //         'nome'=>'Fornecedor 2',
    //         'status' => 'N',
    //         'cnpj' => '00.000.000/000-00',
    //         'ddd' => '32', // Juiz de Fora - MG
    //         'telefone' => '85966352'
    //     ],
    //     2 => [
    //         'nome'=>'Fornecedor 3',
    //         'status' => 'N',
    //         'cnpj' => '00.000.000/000-00',
    //         'ddd' => '85', // Fortaleza - CE
    //         'telefone' => '85966352'
    //     ]
    //     ];

    //     //subscrevendo para testar o forelse
    //     //$fornecedores = [];

    //     // $msg = isset($fornecedores[1]['cnpj']) ? 'Cnpj Informado' : 'Cnpj não informado';
    //     // echo $msg;

    //     return view('app.fornecedor.index', compact('fornecedores'));
    // }

    // public function salvar(Request $Request) {
    //     Fornecedor::create($Request->all());
    //     return view('app.fornecedor');
    // }
}
