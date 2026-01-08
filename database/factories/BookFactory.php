<?php

namespace Database\Factories;

use App\Models\Author;
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
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'price' => fake()->numberBetween(1000,9000),
            'publication_year' =>fake()->year(),
            'author_id' => Author::inRandomOrder()->first()-> id ?? Author::factory(),
            'rent_price'=> 1,
            'rent_id' => 1,
            'category_id' => 1,

        ];
    }
}
