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
        return response()->json(Doador::all());
        //return view('doadores', ['doadores' => $this->doador->all()]);
    }

    public function show($id) {
        $doador = Doador::find($id);
        if ($doador) {
            return response()->json($doador);
            //return view('doador', ['doador' => $doador]);
        } else {
            return response()->json(['message' => 'Doador não encontrado'], 404);
            //return redirect('/doadores')->with('error', 'Doador não encontrado');
        }
    }
}
