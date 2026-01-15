<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookReservation extends Model
{
    protected $table = 'book_reservations';
    protected $fillable = [
        'book_id',
        'reservation_id',
        'reserved_at',
        'due_at',
        'returned_at',
    ];

    // Livro reservado
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id'); // Livro reservado
    }
    
    // Reserva associada
    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class, 'reservation_id'); // Reserva associada
    }
}
