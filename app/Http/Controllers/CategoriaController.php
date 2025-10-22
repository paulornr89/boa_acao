<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index() {
        return view('categorias.index', ['categorias' => Categoria::all()]);
    }

    public function show($id) {
        return view('categorias.show', ['categoria' => Categoria::find($id)]);
    }
    
    public function create() {
        return view('categorias.create');
    }
    
    public function store(Request $request) {
        $novaCategoria = $request->all();

        if(Categoria::create($novaCategoria)) {
            return redirect('/categorias');
        } else {
            dd('Erro ao cadastrar categoria.');
        }
    }
    
    public function edit($id) {
        $categoria = ['categoria' => Categoria::find($id)];

        return view('categorias.edit', $categoria);
    }
    
    public function update(Request $request, $id) {
        $novaCategoria = $request->all();

        if(!Categoria::find($id)->update($novaCategoria)) {
            dd("Não foi possível atualizar a Categoria");
        }

        return redirect('/categorias');
    }
    
    public function delete($id) {
        if(Categoria::find($id)->delete()) {
            return redirect('/categorias');
        } else {
            dd('Erro ao excluir categoria');
        }
    }
}
