<?php

namespace Database\Seeders;

use App\Models\Rent;
use App\Models\User;
use Illuminate\Database\Seeder;

class RentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Pega todos os usuários
        $users = User::all();

        // Para cada usuário, cria um número aleatório de aluguéis
        $users->each(function ($user) {

            Rent::factory()
                ->count(rand(0, 5)) // Sorteia quantos livros esse usuário específico alugou. (rand(0, 5): sorteia um número entre 0 e 5)
                ->for($user)        // Vincula o aluguel a este usuário
                ->create();

        });

    }
}
