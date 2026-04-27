<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameRound extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = [
        'session_id',
        'maqam_id',
        'audio_clip',
        'selected_answer',
        'is_correct',
    ];

    public function gameSession()
    {
        return $this->belongsTo(GameSession::class, 'session_id');
    }

    public function maqam()
    {
        return $this->belongsTo(Maqam::class);
    }
}
