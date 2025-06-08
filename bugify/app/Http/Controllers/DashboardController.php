<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Browse;
use App\Models\Playlist;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Haal genres op uit 'Browse' model (zoals jij gebruikt)
        $genres = Browse::with('music')->orderBy('id', 'asc')->get();

        // Haal playlists op van ingelogde gebruiker
        $playlists = Playlist::where('user_id', Auth::id())->get();

        // Bereken totale duur per playlist
        foreach ($playlists as $playlist) {
            $totalDuration = 0;
            foreach ($playlist->music as $musicId) {
                $music = \App\Models\Music::find($musicId);
                if ($music) {
                    $totalDuration += $music->duration; // in seconden
                }
            }
            $playlist->totalDuration = $totalDuration;
        }

        // Geef genres én playlists door aan de view
        return view('dashboard', compact('genres', 'playlists'));
    }
}
