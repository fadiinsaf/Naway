<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = [
        'name',
        'description',
        'examples',
        'legendary_artists',
        'characteristics',
        'cover_image',
        'examples_audio_url',
        'is_published',
    ];

    protected $casts = [
        'examples_audio_url' => 'array',
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