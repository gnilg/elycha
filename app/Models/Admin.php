<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email', 'password', 'level', 'status', 'token', 'last_name', 'first_name', 'avatar'
    ];

    protected $hidden = ['password']; 

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
