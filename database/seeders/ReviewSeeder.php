<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pega todos os livros
        $books = Book::all(); 
        // Para cada livro, cria um número aleatório de avaliações
        $books->each(function ($books) { 
            Review::factory()
            ->count(rand(5, 20)) // Sorteia quantas avaliações esse livro específico recebeu. (rand(0, 5): sorteia um número entre 0 e 5)
            ->for($books) // Vincula a avaliação a este livro
            ->create();
        });
    }
}
