<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(UserSeeder::class);
        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone_number' => '0895-0000-0000',
        ]);

    }
}