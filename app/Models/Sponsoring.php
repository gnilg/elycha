<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsoring extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date', 'end_date', 'publication_id', 'status'
    ];
}
