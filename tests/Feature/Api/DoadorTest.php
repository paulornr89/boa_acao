<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DoadorTest extends TestCase
{
    use RefreshDatabase; 

    public function test_rota_listar_doadores(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['is-admin']);

        $response = $this->getJson('/api/v1/doadores');

        $response->assertStatus(200);
    }

   public function test_cria_perfil_de_doador_vinculado_ao_usuario_criado(): void
    {
        $usuario = User::factory()->create(); 

        $dadosDoador = [
            'user_id' => $usuario->id, 
            'nome' => 'Carlos Doador',
            'telefone' => '53988887777',
            'endereco' => 'Av. Brasil, 500',
            'cidade' => 'Pelotas', 
            'estado' => 'RS',      
            'cep' => '96000000',
            'documento' => '99999999999', 
            'documento_tipo' => 'PF'
        ];

        $response = $this->postJson('/api/v1/doadores', $dadosDoador);

        $response->assertStatus(201); 

        $this->assertDatabaseHas('doadores', [ 
            'documento' => '99999999999',
            'user_id' => $usuario->id 
        ]);
    }
}