<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class UserUpdatedResource extends UserResource
{
    public function withResponse(Request $request, JsonResponse $response): void {
        $response->setStatusCode(200, 'Usuário Atualizado!');
    }

    public function with(Request $request): array {
        return [
            "message" => "Usuário atualizado com sucesso!"
        ];
    }
}
