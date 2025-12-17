<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DoadorTest extends TestCase
{
    use RefreshDatabase; // <--- Não esqueça disso (limpa o banco)

    public function test_rota_listar_doadores(): void
    {
        // 1. ARRANGE
        // Cria usuário e autentica com permissão (se precisar)
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['is-admin']); // ou a permissão necessária

        // 2. ACT
        $response = $this->getJson('/api/v1/doadores');

        // 3. ASSERT
        $response->assertStatus(200);
    }

   public function test_cria_perfil_de_doador_vinculado_ao_usuario_criado(): void
    {
        // 1. ARRANGE: Criamos o usuário que o Front acabou de gerar
        $usuario = User::factory()->create(); 
        
        // NOTA: Não usamos Sanctum::actingAs($usuario) aqui, 
        // pois você explicou que a rota é pública para permitir o cadastro.

        $dadosDoador = [
            'user_id' => $usuario->id, // O Front envia o ID do usuário criado
            'nome' => 'Carlos Doador',
            'telefone' => '53988887777',
            'endereco' => 'Av. Brasil, 500',
            'cidade' => 'Pelotas', 
            'estado' => 'RS',      
            'cep' => '96000000',
            'documento' => '99999999999', // Enviando limpo (sem pontuação)
            'documento_tipo' => 'PF'
        ];

        // 2. ACT: Tenta criar o doador
        $response = $this->postJson('/api/v1/doadores', $dadosDoador);

        // 3. ASSERT: Espera sucesso (201) e não bloqueio
        $response->assertStatus(201); 

        // Verifica se gravou no banco vinculado corretamente
        $this->assertDatabaseHas('doadores', [ 
            'documento' => '99999999999',
            'user_id' => $usuario->id 
        ]);
    }
}