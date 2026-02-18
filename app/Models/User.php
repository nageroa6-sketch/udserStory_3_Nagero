<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_revisor',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
        'is_revisor'        => 'boolean',
    ];

    public function annunci()
    {
        return $this->hasMany(Annuncio::class);
    }

    // Metodo comodo per blade e middleware
    public function isRevisor(): bool
    {
        return $this->is_revisor === true;
    }

    // Accessor (opzionale – si usa come $user->is_revisor in blade)
    public function getIsRevisorAttribute(): bool
    {
        return $this->is_revisor ?? false;
    }
}