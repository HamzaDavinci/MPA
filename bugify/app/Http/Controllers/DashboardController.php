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
        $genres = Browse::with('music')->orderBy('id', 'asc')->get();
        $playlists = Playlist::with('music')->where('user_id', Auth::id())->get();

        $guestPlaylist = session('guest_playlist');

        return view('dashboard', compact('genres', 'playlists', 'guestPlaylist'));
    }




}
