<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reservation extends Model
{
    /** @use HasFactory<\Database\Factories\ReservationFactory> */
    use HasFactory;

    protected $table = 'reservations';
    protected $casts = ['reserved_at' => 'datetime'];
    protected $fillable = [
        'reserved_by', // ID do usuário que fez a reserva
        'reserved_at', // Data e hora da reserva
        'due_at', // Data de vencimento
        'returned_at' // Data de devolução
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reserved_by'); // Usuário que fez a reserva
    }

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'book_reservation')->withTimestamps(); // Livros reservados
    }
}
