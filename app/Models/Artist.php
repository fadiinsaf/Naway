<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = [
        'name',
        'nationality',
        'city',
        'birth_day',
        'date_of_death',
        'years_active',
        'songs',
        'films',
        'biography',
        'image',
        'audio_examples',
        'is_published',
    ];

protected $casts = [
    'audio_examples' => 'array',
    'birth_day'      => 'date:Y-m-d',
    'date_of_death'  => 'date:Y-m-d',
    'is_published'   => 'boolean',
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