<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::factory()->create([
           'nome' => 'Arroz',
           'descricao' => 'Tipo 1',
           'categoria_id' => 2,
           'unidade' => 'KG'
        ]);
    }
}
