<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
protected $fillable = [
    'name',
    'type',
    'origin',
    'historical_description',
    'image',
    'is_published',
];


    public function comments()
    {
        return $this->morphMany(Comment::class, 'entity');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
