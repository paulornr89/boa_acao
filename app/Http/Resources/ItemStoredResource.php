<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class ItemStoredResource extends ItemResource
{
    public function withResponse(Request $request, JsonResponse $response): void {
        $response->setStatusCode(201, 'Item Criado!');
    }

    public function with(Request $request): array {
        return [
            "message" => "Item criado com sucesso!"
        ];
    }
}
