<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [

        'book_id',
        'author_id',
        'rating',
        'comment',

    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id'); // Livro avaliado
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id'); // Usuário que fez a avaliação
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id'); // Autor avaliado
    }

}