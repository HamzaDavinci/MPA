<?php

namespace App\Http\Controllers;

use App\Models\Music;

class MusicController extends Controller
{
    public function detailpage($id)
    {
        $music = Music::with('band')->findOrFail($id);
        return view('music.detailpage', compact('music'));
    }
}
