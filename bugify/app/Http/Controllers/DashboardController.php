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
        // Haal genres op met muziek
        $genres = Browse::with('music')->orderBy('id', 'asc')->get();

        // Haal playlists op van ingelogde gebruiker, inclusief muziekrelatie
        $playlists = Playlist::with('music')->where('user_id', Auth::id())->get();

        // Je hoeft hier niks meer te rekenen, want total_duration staat al in de database
        // Je kan gewoon in je blade view $playlist->total_duration gebruiken

        return view('dashboard', compact('genres', 'playlists'));
    }

}
