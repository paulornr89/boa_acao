<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoadorUpdatedResource extends DoadorResource
{
    public function withResponse(Request $request, JsonResponse $response): void {
        $response->setStatusCode(200, 'Doador Atualizado!');
    }

    public function with(Request $request): array {
        return [
            "message" => "Doador atualizado com sucesso!"
        ];
    }
}
