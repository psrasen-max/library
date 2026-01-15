<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entrie extends Model
{
    /** @use HasFactory<\Database\Factories\EntrieFactory> */
    use HasFactory;

    protected $table = 'entries';
    protected $fillable = [

        'user_id', // Usuário que registrou a entrada
        'entry_in', // Data da entrada
        'entry_out' // Data de saída
    ];
    protected $casts = [
        'entry_in' => 'datetime',
        'entry_out' => 'datetime',
    ];
    
    // Usuário que registrou a entrada
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id'); // Usuário que registrou a entrada
    }
}
