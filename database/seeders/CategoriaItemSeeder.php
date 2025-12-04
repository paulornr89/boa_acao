<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = Categoria::factory(5)->create();

        foreach ($categorias as $categoria) {
            Item::factory(10)->create([
                'categoria_id' => $categoria->id, 
            ]);
        }
    }
}
