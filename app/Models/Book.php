<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [

        'name',
        'created_by',
        'category_id',
        'author_id',
        'publication_year',
        'purchase_price',
        'rent_price',

    ];

    public function user(): BelongsTo
    {

        return $this->belongsTo(User::class, 'created_by'); // Usuário que criou o livro

    }

    public function category(): BelongsTo
    {

        return $this->belongsTo(Category::class, 'category_id'); // Categoria do livro

    }

    public function author(): BelongsTo
    {

        return $this->belongsTo(Author::class, 'author_id'); // Autor do livro

    }

    public function reviews()
    {

        return $this->hasMany(Review::class, 'book_id'); // Avaliações do livro

    }

    public function rents()
    {

        return $this->hasMany(Rent::class, 'book_id'); // Aluguéis do livro

    }

    public function reservations(): BelongsToMany
    {

        return $this->belongsToMany(Reservation::class, 'book_reservations'); // Reservas do livro
                    
    }

}