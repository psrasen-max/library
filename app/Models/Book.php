<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $table = 'books';
    protected $fillable = [
        'name', // Nome do livro
        'created_by', // ID do usuário que criou o livro
        'category_id', // ID da categoria
        'author_id', // ID do autor
        'sequel_to_id', // ID do livro ao qual este é uma sequência
        'publication_year', // Ano de publicação
        'purchase_price', // Preço de compra
        'rent_price', // Preço de aluguel
        'stock_quantity' // Quantidade em estoque
    ];

    // Usuário que criou o livro
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by'); // Usuário que criou o livro
    }

    // Categoria do livro 
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id'); // Categoria do livro
    }

    // Autor do livro
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id'); // Autor do livro
    }

    // Avaliações do livro
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'book_id'); // Avaliações do livro
    }

    // Aluguéis do livro
    public function rents(): HasMany
    {
        return $this->hasMany(Rent::class, 'book_id'); // Aluguéis do livro
    }

    // Reservas do livro
    public function reservations(): BelongsToMany
    {
        return $this->belongsToMany(Reservation::class, 'book_reservation'); // Reservas do livro
    }

    // Relação de sequência de livros
    public function previousBook(): BelongsTo
    {
        // Livro Anterior (Pai)
        // Leitura: "Eu pertenço ao livro do qual sou sequência"
        return $this->belongsTo(Book::class, 'sequel_to_id');
    }

    // Relação de sequência de livros
    public function nextBook(): HasOne
    {
        // Próximo Livro (Filho)
        // Leitura: "Eu tenho um livro que é sequência minha"
        return $this->hasOne(Book::class, 'sequel_to_id');
    }
}
