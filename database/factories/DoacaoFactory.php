<?php

namespace Database\Factories;

use App\Models\Doacao;
use App\Models\Doador;
use App\Models\Organizacao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doacao>
 */
class DoacaoFactory extends Factory
{
    protected $model = Doacao::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $doadorId = Doador::inRandomOrder()->first()->id;
        $organizacaoId = Organizacao::inRandomOrder()->first()->id;
        return [
            'doador_id' => $doadorId,
            'organizacao_id' => $organizacaoId,
            'status' => $this->faker->randomElement(['Pendente', 'Confirmada', 'Concluída', 'Cancelada']),         
        ];
    }
}
