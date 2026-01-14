<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $table = 'users'; //nome da tabela no banco de dados
    protected $fillable = [  //atributos que podem ser preenchidos em massa
        'name',
        'email',
        'password',
        'phone',
        'address',
        'cep',
        'lat',
        'long',
        'is_admin',
    ];

    protected $hidden = [ //atributos que devem ser ocultados em arrays e JSON
        'password',
        'remember_token',
    ];

    protected $casts = [ //define como certos atributos devem ser convertidos
        'is_admin' => 'boolean', // Garante que is_admin seja tratado como booleano
        'password' => 'hashed', // Laravel 12 recomenda isso para garantir hash automático
    ];

    public function rents(): HasMany
    {
        return $this->hasMany(Rent::class, 'rented_by');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'reserved_by');
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class, 'bought_by');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'avaliated_by');
    }
}
