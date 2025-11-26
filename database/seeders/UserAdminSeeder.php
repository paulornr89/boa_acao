<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $admin_pass = env('APP_ADMIN_PASS');
        if(empty($admin_pass))
            throw new Exception("ERRO: Admin Password!");

        //User::factory(3)->create();
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'is_admin' => true,
            'password' => Hash::make($admin_pass)
        ]);
    }
}
