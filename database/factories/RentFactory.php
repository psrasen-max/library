<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rent>
 */
class RentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'rented_by' => User::inRandomOrder()->first()?->id, // Seleciona um usuário aleatório
            'book_id' => Book::inRandomOrder()->first()?->id, // Seleciona um livro aleatório
            'rent_date' => $this->faker->dateTimeBetween('-1 month', 'now'), // Data de aluguel entre 1 mês atrás e agora
            'returned_at' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),  // Data de devolução opcional
            'reservation_id' => null, // Pode ser nulo, pois nem todo aluguel tem reserva
        ];
    }
}
