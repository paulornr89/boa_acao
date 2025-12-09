<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\DoadorStoreRequest;
use App\Http\Requests\DoadorUpdateRequest;
use App\Http\Resources\DoadorCollection;
use App\Http\Resources\DoadorResource;
use App\Http\Resources\DoadorUpdatedResource;
use App\Models\Doador;
use Exception;
use Illuminate\Http\Request;

class DoadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new DoadorCollection(Doador::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoadorStoreRequest $request)
    {
        try {
            return (new DoadorResource(Doador::create($request->validated())));
        } catch (Exception $error) {
            $this->errorHandler('Erro ao criar novo usuário',$error);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        try {
            $user = $request->user();
            $doador = Doador::findOrFail($id);

            if($user->is_admin || ($user->is_donor && ($user->id == $doador->user_id))){
                return new DoadorResource($doador);
            }

            throw new \Exception("Sem permissão");
        } catch(Exception $error) {
            return $this->errorHandler('Erro ao consultar usuário - Sem permissão',$error, 403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoadorUpdateRequest $request, Doador $doador)
    {
        try {
            if ($request->user()->id == $doador->user_id) {
                $doador->update($request->validated());
                return new DoadorUpdatedResource($doador);
            } else if ($request->user()->is_admin) {
                $doador->update($request->validated());
                return new DoadorUpdatedResource($doador);
            } else {
                throw new Exception("Não autorizado.");
            }
        } catch(Exception $error) {
            return $this->errorHandler('Erro ao atualizar usuário - Sem permissão',$error,403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doador $doador)
    {
        //
    }
}
