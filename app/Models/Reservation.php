<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /** @use HasFactory<\Database\Factories\ReservationFactory> */
    use HasFactory;

    protected $fillable = ['user_id','reservation_id'];

    protected $casts = ['reservation_id'=>'datatime'];

    protected $table = 'reservations';

    public function books()
    {
        return $this->belongsTo(Book::class);
    }
}
