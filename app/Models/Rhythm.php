<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rhythm extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = [
        'name',
        'description',
        'audio_url',
        'score_url',
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
