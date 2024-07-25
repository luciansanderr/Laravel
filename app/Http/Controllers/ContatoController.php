<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato (Request $request) {
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
        return view('site.contato');
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
        $request->validate ([
            'nome' => 'required',
            'telefone' =>'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required',
        ]);
        //SiteContato::create($request->all());
        return view('app.contato');
    }
}
