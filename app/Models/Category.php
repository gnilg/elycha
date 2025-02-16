<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'label', 'status', 'type', 'is_immo'
    ];

    public function posts()
    {
        return $this->hasMany(Publication::class, 'category_id', 'id');
    }

    public function activePosts()
    {
        return $this->posts()->where("status", 1)->count();
    }
}
