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
        return response()->json(Item::all());
        //return view('itens', ['itens' => $this->item->all()]);
    }

    public function show($id) {
        $item = Item::find($id);
        if ($item) {
            return response()->json($item);
            //return view('item', ['item' => $item]);
        } else {
            return response()->json(['message' => 'Item não encontrado'], 404);
            //return redirect('/itens')->with('error', 'Item não encontrado');
        }
    }
}
