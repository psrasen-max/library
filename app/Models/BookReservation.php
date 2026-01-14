<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id'); // Livro reservado
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id'); // Reserva associada
    }


}
