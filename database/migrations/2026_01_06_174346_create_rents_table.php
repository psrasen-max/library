<?php

use App\Models\Book;
use App\Models\Reservation;
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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Book::class, 'book_id')->constrained(); // Livro alugado
            $table->dateTime('rent_date'); // Data do aluguel
            $table->dateTime('returned_at')->nullable(); // Nulo porque o livro pode ainda não ter sido devolvido
            $table->foreignIdFor(Reservation::class, 'reservation_id')->nullable()->constrained()->onDelete('set null'); // Referência à reserva, se houver
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
