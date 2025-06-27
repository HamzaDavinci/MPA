<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-spotify-green">
                Welcome, {{ Auth::user()->name }}!
            </h2>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-xl transition-all duration-200">
                    Log Out
                </button>
            </form>
        </div>
    </x-slot>

    <main class="p-6 max-w-4xl mx-auto bg-background-surface text-center rounded-2xl shadow-lg mt-8">
        <p class="text-[#fafafa] text-xl mb-10">
            You’re logged in to your <span class="text-spotify-green font-semibold">Bugify Dashboard</span> 🎉
        </p>

        <div class="mt-6 grid gap-6 grid-cols-1 md:grid-cols-2 text-left">
@if($guestPlaylist)
    <div id="guestPlaylistModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50">
        <div class="bg-background-surface rounded-xl shadow-lg p-8 max-w-md w-full relative">
            <h2 class="text-2xl font-bold mb-4 text-spotify-green">Guest Playlist Found</h2>
            <p>We found a playlist created while you were a guest named <strong>{{ $guestPlaylist['name'] }}</strong>. Would you like to import it?</p>
            
            <div class="mt-6 flex justify-end space-x-4">
                <form method="POST" action="{{ route('playlists.importGuest') }}">
                    @csrf
                    <button type="submit" class="bg-spotify-green hover:bg-spotify-green-dark text-background-main font-bold py-2 px-4 rounded-xl transition-all duration-200">
                        Import
                    </button>
                </form>

                <form method="POST" action="{{ route('playlists.discardGuest') }}">
                    @csrf
                    <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-xl transition-all duration-200">
                        No, thanks
                    </button>
                </form>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('cancelImport').addEventListener('click', function() {
            document.getElementById('guestPlaylistModal').style.display = 'none';
        });
    </script>
@endif

            {{-- Playlists sectie --}}
            @if(isset($playlists))
            <div class="bg-background-main p-6 rounded-xl shadow-inner">
                <h3 class="text-lg font-bold text-spotify-green mb-2">Your Playlists</h3>

                @if($playlists->isEmpty())
                    <p class="text-gray-400 text-sm">You have no playlists.</p>
                @else
                    <ul class="space-y-2 max-h-64 overflow-y-auto pr-2 scrollbar-custom">
                        @foreach($playlists as $playlist)
                            <li class="bg-background-surface p-3 rounded-xl shadow hover:bg-background-surface/80 transition">
                                <a href="/playlists" class="block">
                                    <p class="text-[#fafafa] font-semibold truncate">{{ $playlist->name }}</p>
                                    <p class="text-gray-400 text-sm">
                                        Total duration: {{ gmdate('H:i:s', $playlist->total_duration) }}
                                    </p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            @endif

            {{-- Browse Library sectie --}}
            <div class="bg-background-main p-6 rounded-xl shadow-inner">
                <h3 class="text-lg font-bold text-spotify-green mb-4">Browse Library</h3>

                @if($genres->isEmpty())
                    <p class="text-gray-400 text-sm">No genres found.</p>
                @else
                    <ul class="space-y-2 max-h-64 overflow-y-auto pr-2 scrollbar-custom">
                        @foreach($genres as $genre)
                            <li class="bg-background-surface p-3 rounded-xl shadow hover:bg-background-surface/80 transition">
                                <a href="/browse" class="block text-[#fafafa] font-semibold">
                                    {{ $genre->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const guestPlaylist = sessionStorage.getItem('guest_playlist');

            if (guestPlaylist) {
                const parsed = JSON.parse(guestPlaylist);

                if (confirm(`Wil je je opgeslagen playlist "${parsed.name}" importeren naar je account?`)) {
                    fetch('/import-guest-playlist', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(parsed)
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Failed to import');
                        return response.json();
                    })
                    .then(data => {
                        alert('Playlist geïmporteerd!');
                        sessionStorage.removeItem('guest_playlist');
                        window.location.reload();
                    })
                    .catch(error => {
                        alert('Er ging iets mis tijdens het importeren.');
                    });
                }
            }
        });
    </script>
</x-app-layout>
