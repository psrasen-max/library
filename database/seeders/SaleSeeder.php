<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pega todos os usuários
        $users = User::all();

        // Para cada usuário, cria um número aleatório de vendas
        $users->each(function ($user) {

            Sale::factory()
                ->count(rand(0, 5)) // Sorteia quantos livros esse usuário específico comprou. (rand(0, 5): sorteia um número entre 0 e 5)
                ->for($user)        // Vincula a venda a este usuário
                ->create();

        });
    }
}
