<?php

namespace Tests\Feature\Api;

use App\Models\Categoria;
use App\Models\Item;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase; 

    public function test_rota_listar_todos_os_itens(): void
    {
        $categoria = Categoria::factory()->create();
        Item::factory()->count(3)->create(['categoria_id' => $categoria->id]);
        
        $url = '/api/v1/itens';

        $response = $this->getJson($url);

        $response->assertStatus(200);
        
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'nome',
                    'descricao',
                    'unidade',
                    'categoria_id'
                ]
            ]
        ]);
    }

    public function test_rota_criar_novo_item_com_sucesso(): void
    {
        $user = User::factory()->create(['is_admin' => true]);
        $categoria = Categoria::factory()->create();
        
        Sanctum::actingAs($user, ['is-donor']);

        $dadosDoItem = [
            'nome' => 'Leite Longa Vida',
            'descricao' => 'Caixa com 12 unidades',
            'unidade' => 'CX',
            'categoria_id' => $categoria->id
        ];

        $response = $this->postJson('/api/v1/itens', $dadosDoItem);

        $response->assertStatus(201); 
        
        $this->assertDatabaseHas('itens', [
            'nome' => 'Leite Longa Vida'
        ]);
    }

    public function test_acessar_rota_inexistente_retorna_404(): void
    {
        $url = '/api/v1/itens/99999999'; 

        $response = $this->getJson($url);

        $response->assertStatus(404);
    }
}