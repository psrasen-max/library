<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reserved_at' => $this->faker->dateTimeBetween('-1 month', 'now'), // Data de reserva
            'due_at' => $this->faker->dateTimeBetween('now', '+1 month'),// Data de vencimento
            'returned_at' => null, // Data de devolução (null se não devolvido)
        ];
    }
}
