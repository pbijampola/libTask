<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tilte' => fake()->name(),
            'author' => fake()->name(),
            'image' => fake()->image('public/assets/uploads/books',640,480,null,false),
            'full_decs' => fake()->paragraph(3),
            'short_decs' => fake()->sentence(20),
        ];
    }
}
