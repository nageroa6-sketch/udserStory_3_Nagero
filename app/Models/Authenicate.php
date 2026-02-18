<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authenicate extends Model
{
    protected $fillable = [
        'email', 'password',
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
}