<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entrie>
 */
class EntrieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id, // Irá pegar um usuário existente aleatoriamente
            'entry_in' => $this->faker->dateTimeBetween('-2 hours', 'now'), // Data de entrada
            'entry_out' => $this->faker->dateTimeBetween('now', '+3 hours'), // Data de saída
        ];
    }
}
