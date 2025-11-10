<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Resources\UsuarioCollection;
use App\Http\Resources\UsuarioResource;
use App\Http\Requests\UsuarioStoreRequest;
use App\Http\Resources\UsuarioStoredResource;
use App\Http\Requests\UsuarioUpdateRequest;
use App\Http\Resources\UsuarioUpdateResource;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new UsuarioCollection(Usuario::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioStoreRequest $request)
    {
        try {
            return new UsuarioStoredResource(Usuario::create($request->validated()));
        } catch (Exception $error) {
            return $this->errorHandler('Erro ao criar novo usuário!!', $error);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        return new UsuarioResource($usuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioUpdateRequest $request, Usuario $usuario)
    {
        try {
            $usuario->update($request->validated());
            return new UsuarioUpdateResource($usuario);
        } catch (Exception $error) {
            return $this->errorHandler("Erro ao atualizar Usuário", $error);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        try {
            $usuario->delete();
            return (new UsuarioResource($usuario))->additional(["message" => "Usuário Removido!!!"]);
        } catch(Exception $error) {
            return $this->errorHandler("Erro ao remover Usuário", $error);
        }
    }
}
