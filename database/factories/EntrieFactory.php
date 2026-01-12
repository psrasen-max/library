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
            
            'entered_by' => User::inRandomOrder()->first()?->id, // Irá pegar um usuário existente aleatoriamente
            'check_in' => $this->faker->dateTimeBetween('-2 months', 'now'),
            'check_out' => $this->faker->dateTimeBetween('now', '+2 months'),

        ];
    }
}
