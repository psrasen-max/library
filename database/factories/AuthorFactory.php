<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => $this->faker->name(), // Nome do autor
            'birthdate' => $this->faker->date(), // Data de nascimento do autor
            'nationality' => $this->faker->country(), // Nacionalidade do autor
            'biography' => $this->faker->paragraph(), // Biografia do autor

        ];
    }
}
