<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doacao;

class DoacaoController extends Controller
{
    private $doacao;

    public function __construct() {
       $this->doacao = new Doacao();
    }

    public function index() {
        return response()->json(Doacao::all());
        //return view('doacoes', ['doacoes' => $this->doacao->all()]);
    }

    public function show($id) {
        $doacao = Doacao::find($id);
        if ($doacao) {
            return response()->json($doacao);
            //return view('doacao', ['doacao' => $doacao]);
        } else {
            return response()->json(['message' => 'Doação não encontrada'], 404);
            //return redirect('/doacoes')->with('error', 'Doação não encontrada');
        }
    }
}
