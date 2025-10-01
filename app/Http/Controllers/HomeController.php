<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        echo "Olá Mundo!";
        dd($this);//tipo o var_dump porém melhor
    }
}
