<?php

namespace App\Http\Controllers\Api;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Resources\ItemCollection;
use App\Http\Resources\ItemResource;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Resources\ItemStoredResource;
use App\Http\Requests\ItemUpdateRequest;
use App\Http\Resources\ItemUpdatedResource;
use Exception;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return new ItemCollection(Item::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemStoreRequest $request)
    {
       try {
            return new ItemStoredResource(Item::create($request->validated()));
       } catch( Exception $error) {
            return $this->errorHandler('Erro ao criar novo item', $error);
       } 
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item) {
        return new ItemResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemUpdateRequest $request, Item $item)
    {
        try{
            $item->update($request->validated());
            return new ItemUpdatedResource($item);
        } catch( Exception $error ) {
            return $this->errorHandler('Erro ao atualizar Item', $error);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        try {
            $item->delete();
            return (new ItemResource($item))->additional(["message" => "Item Removido!"]);
        } catch( Exception $error) {
            return $this->errorHandler("Erro ao remover Item", $error);
        }
    }
}
