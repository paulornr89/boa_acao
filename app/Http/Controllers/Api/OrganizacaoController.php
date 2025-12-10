<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\OrganizacaoStoreRequest;
use App\Http\Requests\OrganizacaoUpdateRequest;
use App\Http\Resources\OrganizacaoCollection;
use App\Http\Resources\OrganizacaoResource;
use App\Http\Resources\OrganizacaoUpdatedResource;
use App\Models\Organizacao;
use Exception;
use Illuminate\Http\Request;

class OrganizacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new OrganizacaoCollection(Organizacao::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganizacaoStoreRequest $request)
    {
        try {
            $user = $request->user();

            if($user->is_admin || ($user->is_organization && ($request->input('user_id') == $user->id))) {
                return (new OrganizacaoResource(Organizacao::create($request->validated())));
            }
        } catch (Exception $error) {
            $this->errorHandler('Erro ao criar nova Organização',$error);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        try {
            $user = $request->user();
            $organizacao = Organizacao::findOrFail($id);

            if($user->is_admin || ($user->is_organization && ($user->id == $organizacao->user_id))){
                return new OrganizacaoResource($organizacao);
            }

            throw new \Exception("Sem permissão");
        } catch(Exception $error) {
            return $this->errorHandler('Erro ao consultar organização - Sem permissão',$error, 403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrganizacaoUpdateRequest $request, $id)
    {
        try {
            $user = $request->user();
            $organizacao = Organizacao::findOrFail($id);

            if($user->is_admin || ($user->is_organization && ($organizacao->user_id == $user->id))){
                $organizacao->razao = $request->input('razao');
                $organizacao->telefone = $request->input('telefone');
                $organizacao->endereco = $request->input('endereco');
                $organizacao->cidade = $request->input('cidade');
                $organizacao->estado = $request->input('estado');
                $organizacao->cep = $request->input('cep');

                $organizacao->update($request->validated());
                return new OrganizacaoUpdatedResource($organizacao);
            } 

            throw new Exception("Não autorizado.");
        } catch(Exception $error) {
            return $this->errorHandler('Erro ao atualizar Organização - Sem permissão',$error,403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            $user = $request->user();
            $organizacao = Organizacao::findOrFail($id);

            if ($user->is_admin || (($user->is_organization && ($organizacao->user_id == $user->id)))) {
                $organizacao->delete();
                return (new OrganizacaoResource($organizacao))->additional(["message" => "ORganização Removida!!!"]);
            }

            throw new Exception("Não autorizado.");
        } catch(Exception $error) {
            return $this->errorHandler("Erro ao deletar Organização", $error,403);
        }
    }
}
