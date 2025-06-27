<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Music;
use App\Models\User;

class Playlist extends Model
{
    protected $fillable = ['user_id', 'name', 'total_duration'];

    public function music()
    {
        return $this->belongsToMany(Music::class, 'playlist_music');
    }

}
