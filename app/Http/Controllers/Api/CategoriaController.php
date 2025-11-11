<?php

namespace App\Http\Controllers\Api;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Resources\CategoriaCollection;
use App\Http\Resources\CategoriaResource;
use App\Http\Requests\CategoriaStoreRequest;
use App\Http\Requests\CategoriaUpdateRequest;
use App\Http\Resources\CategoriaStoredResource;
use App\Http\Resources\CategoriaUpdatedResource;
use Exception;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return new CategoriaCollection(Categoria::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaStoreRequest $request)
    {
        try {
            return new CategoriaStoredResource(Categoria::create($request->validated()));
        } catch(Exception $error) {
            return $this->errorHandler('Erro ao criar nova categoria', $error);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria) {
        return new CategoriaResource($categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaUpdateRequest $request, Categoria $categoria)
    {
        try {
            $categoria->update($request->validated());
            return new CategoriaUpdatedResource($categoria);
        } catch(Exception $error) {
            return $this->errorHandler('Erro ao atualizar Categoria', $error);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        try {
            $categoria->delete();
            return (new CategoriaResource($categoria))->additional(["message" => "Item Removido!"]);
        } catch(Exception $error) {
            return $this->errorHandler("Erro ao remover Categoria", $error);
        }
    }
}
