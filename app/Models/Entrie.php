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
        'title',
        'content',
        'author_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'entered_by'); // Usuário que registrou a entrada
    }

}
