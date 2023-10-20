<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



class PostFactory extends Factory
{

    public function definition(): array
    {
        return [
            'author' => $this->faker->name,
            'title' => $this->faker->sentence,
            'category' => 'general',
            'published' => 1,
            'description' => $this->faker->sentence,
            'urlToImage' => 'images/4e20b65a96e7402689ed14c761d673d0.jpg',
            // Другие поля
        ];
    }
}
