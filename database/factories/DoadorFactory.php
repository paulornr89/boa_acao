<?php

namespace Database\Factories;

use App\Models\Doador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doador>
 */
class DoadorFactory extends Factory
{
    protected $model = Doador::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [            
            'nome' => $this->faker->name(),
            'documento' => $this->faker->unique()->numerify('#############'), 
            'documento_tipo' => $this->faker->randomElement(['PF', 'PJ']),
            'telefone' => $this->faker->numerify('539########'),
            'endereco' => $this->faker->streetAddress(),
            'cep' => $this->faker->numerify('########'),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->stateAbbr()
        ];
    }
}
