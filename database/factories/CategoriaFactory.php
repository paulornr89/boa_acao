<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categorias = [
            'APER' => 'Alimento Perecível',
            'ANPER' => 'Alimento Não Perecível',
            'RADU' => 'Roupa Adulto',
            'RINF' => 'Roupa Infantil',
            'RCB' => 'Roupa Cama e Banho',
            'HIGC' => 'Higiene Corporal',
            'HIGB' => 'Higiene Bucal',
            'HIGI' => 'Higiene Íntima'
        ];

        $sigla = $this->faker->unique()->randomElement(array_keys($categorias));//array_keys gera um array só das chaves
    
        return [
            'sigla' => $sigla,
            'nome' => $categorias[$sigla],
        ];
    }
}
