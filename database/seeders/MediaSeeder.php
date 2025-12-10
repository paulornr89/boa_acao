<?php

namespace Database\Seeders;

use App\Models\Doador;
use App\Models\Item;
use App\Models\Media;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          try {            
            $totalItem = Item::count();            
            $totalDoador = Doador::count();           
            $createdAt = Carbon::now()->toDateTimeString();            
            $modelItemId = fake()->numberBetween(1,$totalItem);
            $modelDoadorId = fake()->numberBetween(1,$totalDoador);
            
            $medias = [
               [                    
                'model_id' => $modelItemId,
                'model_type' => 'App\Models\Item',
                'source' => 'https://www.youtube.com/watch?v=QAfTYrDhdHE',
                'type' => 'video',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
                ],
                [
                'model_id' => $modelItemId,
                'model_type' => 'App\Models\Item',
                'source' => 'https://www.youtube.com/watch?v=5s-_SnVl-1g',
                'type' => 'video',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
                ],
                [
                'model_id' => $modelDoadorId,
                'model_type' => 'App\Models\Doador',
                'source' => 'https://www.youtube.com/watch?v=127ng7botO4',
                'type' => 'video',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
                ],
                [
                'model_id' => $modelDoadorId,
                'model_type' => 'App\Models\Doador',
                'source' => 'https://www.youtube.com/watch?v=veSLRzmOfAI',
                'type' => 'video',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
                ]
            ];
            
            Media::insert($medias)
                ? Log::channel('stderr')->info("Vídeos cadastrados! Doador: $modelDoadorId ")
                : throw new Exception("Erro ao criar promoções!");
          } catch( Exception $error) {
            Log::debug($error->getMessage());
            Log::channel('stderr')->error($error->getMessage());
          }
    }
}
