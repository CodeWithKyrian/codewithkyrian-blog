<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'title' => fake()->realText(30),
            'description' => fake()->realText(250),
            'body' => fake()->paragraphs(20, true),
            'keywords' => fake()->words(5),
            'published_at' => now()->subDays(rand(1, 30)),
        ];
    }
}
