<?php

namespace Database\Seeders;

use App\Models\Doacao;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Obtém todos os IDs de Itens existentes
        $itemIds = Item::pluck('id');

        // 2. Cria 50 Doações (usando a Factory) e, logo após a criação, anexa os itens.
        Doacao::factory(50)
            ->create() // Cria a doação na tabela 'doacoes'
            ->each(function (Doacao $doacao) use ($itemIds) {
                
                // 3. Define quantos itens diferentes (entre 1 e 5) serão doados nesta doação.
                $numItens = rand(1, 5); 

                // 4. Seleciona IDs de itens aleatórios (sem repetição)
                $itensParaAnexar = $itemIds->shuffle()->take($numItens)->all();

                $itensComQuantidade = [];
                foreach ($itensParaAnexar as $itemId) {
                    // Prepara o array com a chave do item ID e o pivot data
                    $itensComQuantidade[$itemId] = [
                        'quantidade' => rand(1, 100), // Valor aleatório para a coluna 'quantidade' na pivo
                    ];
                }

                // 5. Anexa todos os itens à doação (inserindo registros na tabela pivo 'doacao_item')
                $doacao->itens()->attach($itensComQuantidade);
            });
    }
}
