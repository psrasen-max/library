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

    protected $fillable = [

        'reserved_by', // ID do usuário que fez a reserva
        'reservation_at' // Data e hora da reserva

        ];

    protected $casts = ['reservation_at'=>'datetime'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reserved_by'); // Usuário que fez a reserva
    }

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class,'book_reservation')->withTimestamps(); // Livros reservados
    }
    
}
