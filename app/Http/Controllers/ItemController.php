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
}
