<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class ProdutoUpdatedResource extends ProdutoResource
{
    public function withResponse(Request $request, JsonResponse $response): void {
        $response->setStatusCode(200, 'Produto Atualizado!');
    }

    public function with(Request $request): array {
        return [
            "message" => "Produto atualizado com sucesso!"
        ];
    }
}
