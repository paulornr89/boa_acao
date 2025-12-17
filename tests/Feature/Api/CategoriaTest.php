<?php

namespace Tests\Feature\Api;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CategoriaTest extends TestCase
{
    use RefreshDatabase; 

    public function test_rota_listar_categorias(): void
    {
        Categoria::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/categorias');

        $response->assertStatus(200);
        
        $response->assertJsonCount(3, 'data');
    }

    public function test_rota_criar_categoria_com_sucesso(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['is-admin']);

        $dados = [
            'nome' => 'Higiene Pessoal',
            'sigla' => 'HP'
        ];

        $response = $this->postJson('/api/v1/categorias', $dados);

        $response->assertStatus(201); 
        $this->assertDatabaseHas('categorias', ['nome' => 'Higiene Pessoal']);
    }

    public function test_rota_atualizar_categoria_com_sucesso(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['is-admin']);

        $categoria = Categoria::factory()->create(['nome' => 'Nome Antigo', 'sigla' => 'NA']);

        $response = $this->putJson("/api/v1/categorias/{$categoria->id}", [
            'nome' => 'Nome Editado',
            'sigla' => 'NE'
        ]);

        $response->assertStatus(200);
        
        $this->assertDatabaseHas('categorias', [
            'id' => $categoria->id,
            'nome' => 'Nome Editado'
        ]);
    }

    public function test_rota_deletar_categoria_com_sucesso(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['is-admin']);

        $categoria = Categoria::factory()->create();

        $response = $this->deleteJson("/api/v1/categorias/{$categoria->id}");

        $response->assertStatus(200); 
        
        $this->assertDatabaseMissing('categorias', ['id' => $categoria->id]);
    }

    public function test_controller_vincula_item_a_categoria_corretamente(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['is-donor']);
        
        $categoria = Categoria::factory()->create();

        $dadosItem = [
            'nome' => 'Sabão em Pó',
            'descricao' => 'Caixa de 1kg', 
            'unidade' => 'CX',             
            'categoria_id' => $categoria->id
        ];

        $this->postJson('/api/v1/itens', $dadosItem);

        $this->assertDatabaseHas('itens', [
            'nome' => 'Sabão em Pó',
            'categoria_id' => $categoria->id 
        ]);
    }
}