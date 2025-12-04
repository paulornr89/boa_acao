<?php

namespace Database\Seeders;

use App\Models\Organizacao;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)
            ->organizacao()
            ->has(Organizacao::factory()->count(1), 'organizacao')
            ->create();
    }
}
