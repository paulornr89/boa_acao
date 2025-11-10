<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class ItemUpdatedResource extends ItemResource
{
    public function withResponse(Request $request, JsonResponse $response): void {
        $response->setStatusCode(200, 'Item Atualizado!');
    }

    public function with(Request $request): array {
        return [
            "message" => "Item atualizado com sucesso!"
        ];
    }
}
