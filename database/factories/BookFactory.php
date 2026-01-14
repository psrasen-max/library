<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
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
            'name' => $this->faker->words(3, true), // Nome do livro com 3 palavras sem ponto final
            'created_by' => User::where('is_admin', true)->inRandomOrder()->first()?->id, // Seleciona um usuário admin aleatório
            'category_id' => Category::inRandomOrder()->first()?->id, // Seleciona uma categoria aleatória
            'author_id' => Author::inRandomOrder()->first()?->id, // Seleciona um autor aleatório
            'sequel_to_id' => null, // Por padrão, nenhum livro é uma sequência
            'publication_year' => $this->faker->year(), // Ano de publicação aleatório
            'purchase_price' => $this->faker->numberBetween(20, 100), // Preço de compra entre 20 e 100
            'rent_price' => $this->faker->numberBetween(5, 10), // Preço de aluguel entre 5 e 10
            'stock_quantity' => $this->faker->numberBetween(0, 10) // Quantidade em estoque entre 0 e 50
        ];
    }
}
