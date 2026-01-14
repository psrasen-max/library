<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class, // Primeiro cria os usuários
            CategorySeeder::class, // Depois as categorias
            AuthorSeeder::class, // Depois os autores
            BookSeeder::class, // Depois os livros
            EntrieSeeder::class, // Depois as entradas
            ReservationSeeder::class, // Depois as reservas
            RentSeeder::class, // Depois os aluguéis
            ReviewSeeder::class, // Depois as avaliações
            SaleSeeder::class, // Por fim as vendas
         ]);
    }
}
