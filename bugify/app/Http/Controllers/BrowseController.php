<?php

namespace App\Http\Controllers;

use App\Models\Browse; // genres
use App\Models\Music;  // muziek

class BrowseController extends Controller
{
    public function index()
    {
        $genres = Browse::orderBy('id', 'asc')->get();
        $musics = Music::all();

        return view('browse', compact('genres', 'musics'));
    }
}
