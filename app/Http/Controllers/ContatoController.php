<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato (Request $request) {
        $motivo_contatos = MotivoContato::all();
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // //print_r($contato->getAttributes());
        // $contato->save();

        //método de inserção dos dados
        //menos linha de código na controller
        //$contato = new SiteContato();
        //$contato->create($request->all());
        //print_r($contato->getAttributes());
        //$contato->save();
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    // public function salvar (Request $request) {
    //     SiteContato::create($request->all());
    //     //validação e tratamento de erros
    //     $request->validate([
    //         'nome' => 'required',
    //         // 'telefone' => 'required',
    //         // 'email' => 'required',
    //         // 'motivo_contato' => 'required',
    //         // 'mensagem' => 'required'
    //     ]);

    //     return view('site.contato');
    // }

    public function salvar(Request $request) {
        // $motivo_contatos = [
        //     '1' => 'Elogio',
        //     '2' => 'Dúvida',
        //     '3' => 'Reclamação'
        // ];
        //validação
        $request->validate ([
            //validação [unique] usando o nome a tabela do banco
            'nome' => 'required|min:3|max:10|unique:site_contatos',
            'telefone' =>'required|max:11',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required',
        ]);
        //salvando no banco
        SiteContato::create($request->all());
        //retornando para index do projeto
        return redirect()->route('site.index');
    }
}
