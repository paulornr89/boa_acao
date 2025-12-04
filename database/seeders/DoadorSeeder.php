<?php

namespace Database\Seeders;

use App\Models\Doador;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DoadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'email' => 'paulo.rosa@teste.com',
            'is_donor' => true,
            'password' => Hash::make('123')
        ]);

        Doador::factory()->create([
            'user_id' => $user->id,
            'nome' => 'Paulo Rosa',
            'documento' => '02010447000',
            'telefone' => '53984561498',
            'endereco' => 'Rua J.',
            'cep' => '96065345',
            'cidade' => 'Pelotas',
            'estado' => 'RS',
            'documento_tipo' => 'PF'
        ]);

        User::factory(10)
            ->doador()
            ->has(Doador::factory()->count(1), 'doador')
            ->create();
    }
}
