<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index(Request $request) {
        // retornando erro, e menssagem de login
        $erro = '';
        if ($request->get('erro') == '1') {
            $erro = 'Usuário e Senha invalidos';
        }

        if ($request->get('erro') == '2') {
            $erro = 'Usuários e senhas incorretos para o padrão cliente';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

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

        // iniciar o model
        $user = new User();
        // comparações passo o parâmetro que chega pleo request e depois comparo o que está no banco
        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            //primeiro a retornar na consulta no sql
            ->first();

        if (isset($usuario)) {
            // sessão em php para login, do lado do servidor
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return Redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro'=> 1]);
        }
        // condições e validações com confirmação de usuário
        // if (isset($usuario->name)) {
        //     echo "Usuário Logado";
        // } else {
        //     // redirecinando para a tela login
        //     return redirect()->route('site.login', ['erro'=> 1]);
        // }
            // echo "<pre>";
            // print_r($usuario);
            // echo "</pre>";
    }

    public function sair() {
        //rota para destroir a session criada pelo php
        session_destroy();
        return redirect()->route('site.index');
    }
}
