<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->numerify('###########'),
            'password' => bcrypt('sysout777'), // Default password
            'address' => $this->faker->address(),
            'cep' => $this->faker->numerify('########'),
            'lat' => $this->faker->numberBetween(-90, 90),
            'long' => $this->faker->numberBetween(-180, 180),
            'is_admin' => $this->faker->boolean(20), // 20% chance de ser admin

        ];
    }
}
