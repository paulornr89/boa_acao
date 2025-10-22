<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    private $item;

    public function __construct() {
       $this->item = new Item();
    }

    public function index() {
        //return response()->json(Item::all());
        return view('itens', ['itens' => $this->item->all()]);
    }

    public function show($id) {
        return view('item', ['item' => $this->item->find($id)]);
    }

    public function create() {
        return view('item_create');
    }
    
    public function store(Request $request) {
        $novoItem = $request->all();

        if(Item::create($novoItem)) {
            return redirect('/itens');
        }else {
            dd("Erro ao cadastrar Item");
        }
    }
    
    public function edit($id) {
        $item = ['item' => Item::find($id)];

        return view('item_edit', $item);
    }
    
    public function update(Request $request, $id) {
        $itemAtualizado = $request->all();

        if(!Item::find($id)->update($itemAtualizado)) {
            dd("Não foi possível atualizar o Item");
        }

        return redirect('/itens');
    }

    public function delete($id) {
        if(Item::find($id)->delete()) {
           return redirect('/itens');
        } else {
            dd("Erro ao excluir item");
        }
    }
}
