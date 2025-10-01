<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doador;

class DoadorController extends Controller
{
    private $doador;

    public function __construct() {
       $this->doador = new Doador();
    }

    public function index() {
        //return response()->json(Doador::all());
        return view('doadores', ['doadores' => $this->doador->all()]);
    }

    public function show($id) {
        return view('doador', ['doador' => $this->doador->find($id)]);
    }
}
