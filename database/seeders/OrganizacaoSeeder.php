<?php

namespace Database\Seeders;

use App\Models\Organizacao;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OrganizacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'email' => 'sociedade.uniao@teste.com',
            'is_organization' => true,
            'password' => Hash::make('123')
        ]);

        Organizacao::factory()->create([
            'user_id' => $user->id,
            'razao' => 'Sociedade União',
            'documento' => '02104480000182',
            'telefone' => '53984561490',
            'endereco' => 'Rua J.',
            'cep' => '96065345',
            'cidade' => 'Pelotas',
            'estado' => 'RS',
            'documento_tipo' => 'PJ'
        ]);

        User::factory(10)
            ->organizacao()
            ->has(Organizacao::factory()->count(1), 'organizacao')
            ->create();
    }
}
