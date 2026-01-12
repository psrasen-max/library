<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /** @use HasFactory<\Database\Factories\AuthorFactory> */
    use HasFactory;

    protected $fillable = [

        'name',
        'birthdate',
        'nationality',
        'biography',

    ];

    protected $table = 'authors';

    public function books()
    {

        return $this->hasMany(book::class);

    }
}
