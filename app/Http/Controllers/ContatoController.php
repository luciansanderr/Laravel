<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato () {
        var_dump ($_GET);
        return view('site.contato');
    }
}
