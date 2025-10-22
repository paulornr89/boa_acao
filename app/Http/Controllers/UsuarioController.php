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
        //return response()->json($this->usuario->all());//retorna todos os usuarios em json
        return view('usuarios', ['usuarios' => $this->usuario->all()]);
    }

    public function show($id) {
        //return response()->json($this->usuario->find($id));
        return view('usuario', ['usuario' => $this->usuario->find($id)]);
    }

    public function create() {
        return view('usuario_create');
    }

    public function store(Request $request) {
        $newUsuario = $request->all();

        if(Usuario::create($newUsuario)) {
            return redirect('/usuarios');
        } else {
            dd("Erro ao cadastrar usuário");
        }
    }

    public function edit($id) {
        $data = ['usuario' => Usuario::find($id)];

        return view('usuario_edit', $data);
    }

    public function update(Request $request, $id) {
        $usuarioAtualizado = $request->all();

        if(!Usuario::find($id)->update($usuarioAtualizado)) {
            dd("Erro ao atualizar usuário");
        }

        return redirect('/usuarios');
    }

    public function delete($id) {
        if(Usuario::find($id)->delete()){
            return redirect('/usuarios'); 
        } else {
            dd("Erro ao excluir usuário $id");
        }
    }
}
