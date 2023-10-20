<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Post::factory(50)->create([
                'category' => 'general',
            ]
        );
        Post::factory(50)->create([
                'category' => 'entertainment',
            ]
        );
        Post::factory(50)->create([
                'category' => 'business',
            ]
        );
        Post::factory(50)->create([
                'category' => 'general',
            ]
        );
        Offer::factory(100)->create();
         User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@test',
             'password' => '12345678',
         ]);
    }
}
