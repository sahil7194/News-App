<?php

namespace Database\Factories;

use App\Models\Author;
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
    public function definition(): array
    {
        return [
            "title" => fake()->sentence(),
            "body" => fake()->paragraph(3),
            "summary" => fake()->sentence(),
            "image_url" => fake()->imageUrl(),
            "author_id" => Author::inRandomOrder()->first()->id
        ];
    }
}
