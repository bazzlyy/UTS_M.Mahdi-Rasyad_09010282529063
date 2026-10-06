<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            BookSeeder::class,
        ]);

        // Create default admin user
        \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'admin@perpustakaan.com',
            'password' => bcrypt('password'),
        ]);
    }
}
