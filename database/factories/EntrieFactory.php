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
            
            'entered_by' => User::inRandomOrder()->first()?->id, // Irá pegar um usuário existente ou criar um novo se não houver nenhum 
            'check_in' => now(),
            'check_out' => now(),
        ];
    }
}
