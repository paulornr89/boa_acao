<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class CategoriaStoredResource extends CategoriaResource
{
    public function withResponse(Request $request, JsonResponse $response): void {
        $response->setStatusCode(201, 'Categoria Criada!');
    }

    public function with(Request $request): array {
        return [
            "message" => "Categoria criada com sucesso!"
        ];
    }
}
