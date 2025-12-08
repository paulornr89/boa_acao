<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
       $this->call([
        UserAdminSeeder::class,
        DoadorSeeder::class,
        OrganizacaoSeeder::class,
        CategoriaItemSeeder::class,
        DoacaoSeeder::class, 
        ItemSeeder::class,
       ]);
    }
}
