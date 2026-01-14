<?php

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
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
            $table->foreignIdFor(User::class, 'avaliated_by'); // Usuário que criou a avaliação
            $table->foreignIdFor(Book::class, 'book_id'); // Livro avaliado
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
