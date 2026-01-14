<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /** @use HasFactory<\Database\Factories\AuthorFactory> */
    use HasFactory;

    protected $table = 'authors';

    protected $fillable = [
        'name', // Nome do autor
        'birthdate', // Data de nascimento
        'nationality', // Nacionalidade
        'biography' // Biografia
    ];
    

    public function books()
    {
        return $this->hasMany(book::class);
    }
}
