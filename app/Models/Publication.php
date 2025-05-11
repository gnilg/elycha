<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Publication extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'label', 'place', 'description', 'price',
        'place_lat', 'place_long', 'photo',
        'user_id', 'category_id', 'status', 'is_immo','video','type', 'category_type_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }


    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function photos()
    {
        return $this->hasMany(Image::class);
    }


    public function likes(): MorphMany
{
    return $this->morphMany(Like::class, 'likeable');
}

public function likess()
{
    return $this->hasMany(Like::class, 'publication_id', 'id');
}


    public function views()
    {
        return $this->hasMany(View::class, 'publication_id', 'id');
    }

    public function sponsorings()
    {
        return $this->hasMany(Sponsoring::class, 'publication_id', 'id');
    }

    public function lastSponsoring()
    {
        return $this->sponsorings()->orderBy('id', 'DESC')->first();
    }
}
