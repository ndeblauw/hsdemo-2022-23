<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'body' => fake()->realText(),
            'published_at' => fake()->dateTimeBetween('-2 weeks', 'now'),
            'author_id' => fake()->numberBetween(1, 10),
            'tag_id' => fake()->numberBetween(1, 10),
        ];
    }
}
