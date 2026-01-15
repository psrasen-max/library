<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sale extends Model
{
    /** @use HasFactory<\Database\Factories\SaleFactory> */
    use HasFactory;

    protected $table = 'sales';
    protected $fillable = [
        'user_id',
        'total_amount'
    ];

    // Usuário que realizou a compra
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'bought_by');
    }
    
    // Livros vendidos na compra
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'book_sale')->withPivot('individual_price');
    }
}
