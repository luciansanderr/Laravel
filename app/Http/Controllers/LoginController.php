<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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

        //recuperação de dados
        $email = $request->get('usuario');
        $password = $request->get('senha');

        echo "Usuário: $email | Senha: $password";
        echo "<br>";

        // iniciar o model
        $user = new User();
        // comparações passo o parâmetro que chega pleo request e depois comparo o que está no banco
        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();
        // condições e validações com confirmação de usuário
        if (isset($usuario->name)) {
            echo "Usuário Logado";
        } else {
            echo "Usuário Incorreto";
        }
            // echo "<pre>";
            // print_r($usuario);
            // echo "</pre>";
    }
}
