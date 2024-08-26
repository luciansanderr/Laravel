<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('site.login');
    }

    // public function autenticar() {
    //     echo "Chegamos até aqui";
    // }

    public function autenticar(Request $request) {
        // regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];
        // as mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuário(e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        // se não passar pelo validade será retornado para rota anterior
        $request->validate($regras, $feedback);

        print_r($request);
    }
}
