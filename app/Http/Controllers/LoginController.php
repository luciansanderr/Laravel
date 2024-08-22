<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('site.login');
    }

    public function autenticar() {
        echo "Chegamos até aqui";
    }
}
