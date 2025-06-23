<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Browse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Playlist;
use App\Models\Band;

class Music extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'duration', 'genre_id'];

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_music');
    }


    public function genre()
    {
        return $this->belongsTo(Browse::class, 'genre_id');
    }

    public function band()
    {
        return $this->belongsTo(Band::class);
    }
}
