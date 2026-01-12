<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'user_id' => User::inRandomOrder()->first()?->id, // Irá pegar um usuário existente ou criar um novo se não houver nenhum. ->first(): Pega apenas o primeiro registro dessa lista embaralhada.
            'total_amount' => $this->faker->numberBetween(100, 1000),

        ];
    }
}
