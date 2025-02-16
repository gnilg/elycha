<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoostPublication extends Model
{
    use HasFactory;

    protected $fillable = ["phone", "duration", "amount", "type", "state", "identifier", "publication_id", 'reference'];

    public function publication()
    {
        return $this->belongsTo('App\Models\Publication', 'publication_id');
    }
}
