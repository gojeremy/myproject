<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
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
         Category::factory()->create(['name' => 'Бизнес', 'priority_num' => 0, 'published' => 1, 'idName' => 'business']);
         Category::factory()->create(['name' => 'Общее', 'priority_num' => 1, 'published' => 1, 'idName' => 'general']);

        Post::factory(35)->create([
                'category' => 'general',
            ]
        );
        Post::factory(35)->create([
                'category' => 'business',
            ]
        );

        Offer::factory(50)->create();

         User::factory()->create([
             'name' => 'Admin User',
             'email' => 'test_user@admin-panel.org',
             'password' => 'Boria001',
         ]);
    }
}
