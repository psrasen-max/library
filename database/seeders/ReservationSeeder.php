<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        // Pega todos os usuários
        $users = User::all();
        // Para cada usuário, cria um número aleatório de reservas
        $users->each(function ($user) {
            Reservation::factory()
            ->count(rand(0, 2))
            ->for($user)
            ->create();
        });
    }
}
