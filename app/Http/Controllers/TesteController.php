<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste (int $n1, int $n2) {

        $x = $n1 + $n2;

        return view('site.teste', ['x' => $x, 'n1' => $n1, 'n2' => $n2]);
    }
}
