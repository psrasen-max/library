<?php

use App\Models\Sale;
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
        Schema::create('book_sale', function (Blueprint $table) { // Tabela pivô entre livros e vendas

            $table->foreignIdFor(Sale::class, 'sale_id'); // Venda associada
            $table->foreignIdFor(Book::class, 'book_id'); // Livro vendido
            $table->integer('quantity')->default(1); // Quantidade de livros vendidos
            $table->decimal('individual_price', 10, 2); // Preço individual no momento da venda
            $table->timestamps();

            $table->primary(['sale_id', 'book_id']); // Chave primária composta

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_sale');
    }
};
