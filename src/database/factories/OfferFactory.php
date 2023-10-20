<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'published' => 1,
            'urlToImage' => '/images/4e20b65a96e7402689ed14c761d673d0.jpg',
            'urlToImage' => 'https://google.com/',
            // Другие поля
        ];
    }
}
