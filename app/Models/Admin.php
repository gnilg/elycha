<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'password', 'level', 'status', 'token', 'last_name', 'first_name', 'avatar'
    ];
}
