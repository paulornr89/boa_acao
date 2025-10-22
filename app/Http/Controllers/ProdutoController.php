<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $produto;

    public function __construct() {
       $this->produto = new Produto();
    }

    public function index() {
        // return response()->json($this->produto->all());//retorna todos os produtos em json
        return view('produtos', ['produtos' => $this->produto->all()]);
    }

    public function show($id) {
        //return response()->json($this->produto->find($id));
        return view('single', ['produto' => $this->produto->find($id)]);
    }

    public function create() {
        return view('produto_create');
    }

    public function store(Request $request) {
        $newProduto = $request->all();
        $newProduto['importado'] = ($request->importado) ? true : false;

        if(Produto::create($newProduto)) {//o create aqui é um método do Eloquent diferente do create do produto
            return redirect('/produtos');
        } else {
            dd("Erro ao criar produto");
        }
    }

    public function update(Request $request, $id) {
        // $atualizado = $request->all();
        // $produto = Produto::find($id);
        // $produto->nome = $atualizado['nome'];
        // $produto->descricao = $atualizado['descricao'];
        // $produto->qtd_estoque = $atualizado['qtd_estoque'];
        // $produto->preco = $atualizado['preco'];
        // $produto->importado = (isset($atualizado['importado'])) ? true : false;

        //mais simples
        $atualizado = $request->all();
        $atualizado['importado'] = ($request->importado) ? true : false;

        // if(!$produto->save()) {
        //     dd("Erro ao atualizar produto");
        // }
        if(!Produto::find($id)->update($atualizado)) {
            dd("Erro ao atualizar produto $id");
        }
        return redirect('/produtos');
    }

    public function edit($id) {
        $data = ['produto' => Produto::find($id)];
        return view('produto_edit', $data);
    }

    public function delete($id) {
        if(Produto::find($id)->delete()){
            return redirect('/produtos');
        } else {
            dd("Erro ao excluir produto $id");
        }
    }
}
