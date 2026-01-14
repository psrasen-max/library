<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /** @use HasFactory<\Database\Factories\SaleFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_amount'
    ];

    protected $table = 'sales';

    public function user()
    {
        return $this->belongsTo(User::class, 'bought_by');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class,'book_sale')->withPivot('individual_price');
    }
}
