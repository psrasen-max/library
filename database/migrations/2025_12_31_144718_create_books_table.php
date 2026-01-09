<?php

use App\Models\Author;
use App\Models\Category;
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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(User::class, 'created_by'); // Usuário que cadastrou o livro
            $table->foreignIdFor(Category::class, 'category_id'); // Categoria do livro
            $table->foreignIdFor(Author::class, 'author_id');  // Autor do livro
            $table->year('publication_year');
            $table->integer('purchase_price');
            $table->integer('rent_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
