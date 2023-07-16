<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => Str::random(9),
            'content' => Str::random(99),
            'keyword' => Str::random(10),
            'category_id' => 1,
            'author_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
