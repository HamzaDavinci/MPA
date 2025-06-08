<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $fillable = ['name', 'user_id', 'music', 'total_duration'];

    protected $casts = [
        'music' => 'array', // JSON veld casten naar array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Voeg deze functie toe:
    public function music()
    {
        // Assuming je pivot-tabel heet playlist_music en het model voor muziek heet Music
        return $this->belongsToMany(Music::class, 'playlist_music', 'playlist_id', 'music_id');
    }
}
