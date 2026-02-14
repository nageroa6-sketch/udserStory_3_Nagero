<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name','email','password','is_revisor'];
    protected $casts = ['is_revisor' => 'boolean'];

    public function annunci()
    {
        return $this->hasMany(Annuncio::class);
    }
}
