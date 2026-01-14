<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    
    //atributos que podem ser preenchidos em massa
    protected $fillable = [
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
    protected $table = 'users';
    
    protected $casts = [
        'is_admin' => 'boolean',
        'password' => 'hashed',// Laravel 12 recomenda isso para garantir hash automático
    ];

    public function rents()
    {
        return $this->hasMany(Rent::class, 'rented_by');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


}
