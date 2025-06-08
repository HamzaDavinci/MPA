<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Browse;
use App\Models\Playlist;

class Music extends Model
{
    protected $fillable = ['title', 'genre_id'];

    public function genre()
    {
        return $this->belongsTo(Browse::class);
    }

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_music', 'music_id', 'playlist_id');
    }
}
