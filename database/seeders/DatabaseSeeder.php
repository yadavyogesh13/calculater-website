<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
        ]);
        
        // Call other seeders
        $this->call([
            CategoriesTableSeeder::class,
            PostsTableSeeder::class,
        ]);
    }
}
