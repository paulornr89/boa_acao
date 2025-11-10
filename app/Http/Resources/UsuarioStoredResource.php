<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class UsuarioStoredResource extends UsuarioResource
{
    public function withResponse(Request $request, JsonResponse $response): void {
        $response->setStatusCode(201, 'Usuário Criado!');
    }

    public function with(Request $request): array {
        return [
            "message" => "Usuário criado com sucesso!"
        ];
    }
}
