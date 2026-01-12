<?php

use App\Models\Book;
use App\Models\Reservation;
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
        Schema::create('book_reservation', function (Blueprint $table) {

            $table->foreignIdFor(Reservation::class, 'reservation_id'); // Chave estrangeira para a tabela reservations
            $table->foreignIdFor(Book::class, 'book_id'); // Chave estrangeira para a tabela books
            $table->dateTime('reserved_at'); // Data de reserva
            $table->dateTime('due_at'); // Data de vencimento
            $table->dateTime('returned_at')->nullable(); // Data de devolução (null se não devolvido)

            $table->primary(['reservation_id', 'book_id']); // Chave primária composta. Define que um livro só pode aparecer uma vez por reserva.

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_reservation');
    }
};
