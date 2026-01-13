<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'book_id' => Book::inRandomOrder()->first()?->id, // Livro avaliado
            'author_id' => Author::inRandomOrder()->first()?->id, // Autor avaliado
            'rating' => $this->faker->numberBetween(1, 5), // Avaliação de 1 a 5
            'comment' => $this->faker->paragraph(), // Comentário da avaliação
            
        ];
    }
}
