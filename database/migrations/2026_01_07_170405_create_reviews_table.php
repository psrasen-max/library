<?php

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {

            $table->id();
            $table->foreignIdFor(Book::class, 'book_id'); // Livro avaliado
            $table->foreignIdFor(Author::class, 'author_id'); // Autor avaliado
            $table->integer('rating'); // Avaliação de 1 a 5
            $table->text('comment'); // Comentário da avaliação
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
