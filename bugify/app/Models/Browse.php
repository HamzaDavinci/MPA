<?php

// app/Models/Browse.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Browse extends Model
{
    protected $table = 'genres'; // als de tabel nog 'genres' heet in je DB

    public function music()
    {
        return $this->hasMany(Music::class, 'genre_id');
    }
    
}
