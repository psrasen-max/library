<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rent extends Model
{
    /** @use HasFactory<\Database\Factories\RentFactory> */
    use HasFactory;

    protected $table = 'rents';

    protected $fillable = [
        'rented_by',
        'book_id',
        'rent_date',
        'returned_at',
        'reservation_id',
    ];

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'rented_by'); // Usuário que alugou o livro
    }

    public function book(): BelongsTo 
    {
        return $this->belongsTo(Book::class, 'book_id'); // Livro alugado
    }

    public function reservation(): BelongsTo 
    {
        return $this->belongsTo(Reservation::class, 'reservation_id'); // Referência à reserva, se houver
    }

}
