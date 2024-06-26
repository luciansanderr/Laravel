<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste (int $n1, int $n2) {

        $x = $n1 + $n2;

        //return view('site.teste', ['x' => $x, 'n1' => $n1, 'n2' => $n2]); //array associativa
        //return view('site.teste', compact('n1','n2','x')); //método compact
        return view('site.teste')->with('total',$x)->with('n1', $n1)->with('n2', $n2); //utilizando outro método para passar os parâmetros para a view

    }
}
