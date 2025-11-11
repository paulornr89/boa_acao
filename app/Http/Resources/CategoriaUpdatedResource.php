<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class CategoriaUpdatedResource extends CategoriaResource

{
    public function withResponse(Request $request, JsonResponse $response): void {
        $response->setStatusCode(200, 'Categoria Atualizada!');
    }

    public function with(Request $request): array {
        return [
            "message" => "Categoria atualizado com sucesso!"
        ];
    }
}
