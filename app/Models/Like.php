<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'likeable_id', 'likeable_type', 'publication_id'];


    public function publication()
    {
        return $this->belongsTo('App\Models\Publication', 'publication_id');
    }



    public function likeable(): MorphTo
    {
        return $this->morphTo();
    }
}
