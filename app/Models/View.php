<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "publication_id"];


    public function publication()
    {
        return $this->belongsTo('App\Models\Publication', 'publication_id');
    }
}
