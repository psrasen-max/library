<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $table = 'users'; //nome da tabela no banco de dados
    protected $fillable = [  //atributos que podem ser preenchidos em massa
        'name', // Nome do usuário
        'email', // Email do usuário
        'password', // Senha do usuário
        'phone', // Telefone do usuário
        'address', // Endereço do usuário
        'cep', // CEP do usuário
        'lat', // Latitude do usuário
        'long', // Longitude do usuário
        'is_admin', // Indica se o usuário é administrador
    ];

    protected $hidden = [ //atributos que devem ser ocultados em arrays e JSON
        'password',
        'remember_token',
    ];

    protected $casts = [ //define como certos atributos devem ser convertidos
        'is_admin' => 'boolean', // Garante que is_admin seja tratado como booleano
        'password' => 'hashed', // Laravel 12 recomenda isso para garantir hash automático
    ];

    // Relações alugéis feitos pelo usuário
    public function rents(): HasMany
    {
        return $this->hasMany(Rent::class, 'rented_by');
    }

    // Relação com reservas feitas pelo usuário
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'reserved_by');
    }

    // Relação com vendas feitas pelo usuário
    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class, 'bought_by');
    }

    // Relação com avaliações feitas pelo usuário
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'avaliated_by');
    }

    // Relação com entradas registradas pelo usuário
    public function entries(): HasMany
    {
        return $this->hasMany(Entrie::class, 'user_id');
    }
}
