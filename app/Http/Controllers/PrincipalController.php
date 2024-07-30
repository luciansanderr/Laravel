<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal () {
        $motivo_contatos = [
            '1' => 'Elogio',
            '2' => 'Dúvida',
            '3' => 'Reclamação'
        ];

        return view('site.principal', ['motivo_contatos' => $motivo_contatos]);
    }
}
