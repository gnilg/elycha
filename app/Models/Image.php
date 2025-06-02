<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo', 'publication_id','path',
    ];

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
