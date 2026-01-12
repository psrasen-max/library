<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $authors = Author::all(); // Pega todos os autores

        $authors->each(function ($authors) { // Para cada autor, cria um número aleatório de avaliações

            Review::factory()
            ->count(rand(5, 20)) // Sorteia quantas avaliações esse autor específico recebeu. (rand(0, 5): sorteia um número entre 0 e 5)
            ->for($authors)        // Vincula a avaliação a este autor
            ->create();

        });

    }
}
