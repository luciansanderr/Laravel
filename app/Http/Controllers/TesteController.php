<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste (int $n1, int $n2) {
        echo $n1 + $n2;
    }
}
