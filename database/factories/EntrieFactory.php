<?php

namespace Database\Factories;

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
            
            'user_id' => \App\Models\User::inRandomOrder()->first()?->id ?? \App\Models\User::factory(), // Irá pegar um usuário existente ou criar um novo se não houver nenhum 
            'clock_in' => now(),
            'clock_out' => now(),
        ];
    }
}
