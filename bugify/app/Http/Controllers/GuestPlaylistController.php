<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class GuestPlaylistController extends Controller
{
    public function index()
    {
        $playlist = session('guest_playlist');

        $music = Music::with('genre')->get();

        return view('guestplaylists', [
            'playlist' => $playlist,
            'music' => $music
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'music_ids' => 'required|array|min:1',
            'music_ids.*' => 'integer|exists:music,id',
        ]);

        $musicCollection = Music::whereIn('id', $validated['music_ids'])->get()->map(function ($song) {
            return [
                'id' => $song->id,
                'title' => $song->title,
                'duration' => $song->duration,
                'genre' => $song->genre->name ?? 'Unknown Genre',
            ];
        })->toArray();

        $totalDuration = array_sum(array_column($musicCollection, 'duration'));

        $playlist = [
            'id' => uniqid(),
            'name' => $validated['name'],
            'music' => $musicCollection,
            'total_duration' => $totalDuration,
        ];

        // Sla de guest playlist op in de session
        session(['guest_playlist' => $playlist]);

        return back()->with('success', 'Guest playlist saved temporarily');
    }


    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'music_ids' => 'required|array|min:1',
            'music_ids.*' => 'integer|exists:music,id',
        ]);

        $playlist = session('guest_playlist', []);

        $musicCollection = Music::whereIn('id', $validated['music_ids'])->get()->map(function ($song) {
            return [
                'id' => $song->id,
                'title' => $song->title,
                'duration' => $song->duration,
                'genre' => $song->genre->name ?? 'Unknown Genre',
            ];
        })->toArray();

        $totalDuration = array_sum(array_column($musicCollection, 'duration'));

        $playlist = array_merge($playlist, [
            'name' => $validated['name'],
            'music' => $musicCollection,
            'total_duration' => $totalDuration,
        ]);

        session(['guest_playlist' => $playlist]);

        return back()->with('success', 'GuestPlaylist edited');
    }

    public function destroy()
    {
        session()->forget('guest_playlist');

        return back()->with('success', 'GuestPlaylist deleted');
    }
}
