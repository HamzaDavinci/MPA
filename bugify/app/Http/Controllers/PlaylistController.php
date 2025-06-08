<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Music;
use App\Models\Playlist;

class PlaylistController extends Controller
{
    public function index()
    {
        $music = Music::with('genre')->get();
        $playlists = Auth::check()
            ? Playlist::where('user_id', Auth::id())->get()
            : collect();

        return view('playlists', compact('music', 'playlists'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->withErrors('You must be logged in to create playlists.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'music_ids' => 'array',
            'music_ids.*' => 'integer|exists:music,id',
        ]);

        // Verwijder alle apostrofs uit de naam
        $cleanedName = str_replace("'", "ʼ", $validated['name']);  // gebruikt U+02BC

        $playlist = Playlist::create([
            'user_id' => Auth::id(),
            'name' => $cleanedName,
            'music' => $validated['music_ids'] ?? [],
        ]);

        return redirect()->route('playlists.index')->with('success', 'Playlist created!');
    }



    public function update(Request $request, Playlist $playlist)
    {
        if (!Auth::check() || Auth::id() !== $playlist->user_id) {
            return redirect('/login')->withErrors('You are not authorized to edit this playlist.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'music_ids' => 'array',
            'music_ids.*' => 'integer|exists:music,id',
        ]);

        // Zorg dat ' vervangen wordt door de veilige variant
        $safeName = str_replace("'", "ʼ", $validated['name']); // U+02BC

        $playlist->update([
            'name' => $safeName,
            'music' => $validated['music_ids'] ?? [],
        ]);

        return redirect()->route('playlists.index')->with('success', 'Playlist updated!');
    }

    public function destroy(Playlist $playlist)
    {
        if ($playlist->user_id !== Auth::id()) {
            abort(403);
        }

        $playlist->delete();

        return redirect()->route('playlists.index')->with('success', 'Playlist deleted!');
    }
    

}
