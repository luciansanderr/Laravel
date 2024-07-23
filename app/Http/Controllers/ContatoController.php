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
        $contato = new SiteContato();
        $contato->fill($request->all());
        //print_r($contato->getAttributes());
        $contato->save();
        return view('site.contato');
    }
}
