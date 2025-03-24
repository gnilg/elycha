<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Admin::create([
            'last_name' => 'Test',
            'first_name' => 'User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // Utilise Hash pour sécuriser
            'level' => '3',
        ]);
    }
}
