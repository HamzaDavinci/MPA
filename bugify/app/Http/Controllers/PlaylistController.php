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
            ? Playlist::with('music.genre')->where('user_id', Auth::id())->get()
            : collect();

        return view('playlists', compact('music', 'playlists'));
    }

    public function store(Request $request)
{
    $playlist = Playlist::create([
        'user_id' => auth()->id(),
        'name' => $request->name,
    ]);

    $playlist->music()->sync($request->music_ids);

    // update total_duration
    $playlist->total_duration = $playlist->music()->sum('duration');
    $playlist->save();

    return redirect()->route('playlists.index')->with('success', 'Playlist created!');
}

public function update(Request $request, Playlist $playlist)
{
    $playlist->update([
        'name' => $request->name,
    ]);

    $playlist->music()->sync($request->music_ids);

    // update total_duration
    $playlist->total_duration = $playlist->music()->sum('duration');
    $playlist->save();

    return redirect()->route('playlists.index')->with('success', 'Playlist edited!');
}


    public function destroy(Playlist $playlist)
    {
        if ($playlist->user_id !== Auth::id()) {
            abort(403);
        }

        $playlist->music()->detach();

        $playlist->delete();

        return redirect()->route('playlists.index')->with('success', 'Playlist deleted!');
    }

    public function importGuest(Request $request)
    {
        $guestPlaylist = session('guest_playlist');

        if (!$guestPlaylist) {
            return redirect()->back()->with('error', 'No guest playlist found.');
        }
        
        $totalDuration = array_sum(array_column($guestPlaylist['music'], 'duration'));

        $playlist = Playlist::create([
        'user_id' => Auth::id(),
        'name' => $guestPlaylist['name'],
        'total_duration' => $guestPlaylist['total_duration'] ?? 0,

        
    ]);

        if (!empty($guestPlaylist['music'])) {
            foreach ($guestPlaylist['music'] as $song) {
                $playlist->music()->attach($song['id']);
            }
        }

        session()->forget('guest_playlist');

        return redirect()->route('dashboard')->with('success', 'Guest playlist imported successfully.');
    }

    public function discardGuest(Request $request)
    {
        session()->forget('guest_playlist');

        return redirect()->route('dashboard')->with('info', 'Guest playlist discarded.');
    }


}
