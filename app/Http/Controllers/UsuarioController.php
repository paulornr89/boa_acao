<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    private $usuario;
    
    public function __construct() {
       $this->usuario = new Usuario();
    }

    public function index() {
        return response()->json($this->usuario->all());//retorna todos os usuarios em json
        // return view('usuarios', ['usuarios' => $this->usuario->all()]);
    }

    public function show($id) {
        return response()->json($this->usuario->find($id));
        // return view('single', ['usuario' => $this->usuario->find($id)]);
    }
}
