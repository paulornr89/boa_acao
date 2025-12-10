<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizacaoUpdatedResource extends OrganizacaoResource
{
    public function withResponse(Request $request, JsonResponse $response): void {
        $response->setStatusCode(200, 'Organização Atualizada!');
    }

    public function with(Request $request): array {
        return [
            "message" => "ORganização atualizada com sucesso!"
        ];
    }
}
