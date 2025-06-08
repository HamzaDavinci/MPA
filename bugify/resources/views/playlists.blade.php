<!DOCTYPE html>
<html lang="en" class="bg-background-main text-[#fafafa]">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bugify - Playlists</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen">

    @include('navbar')

    <main class="flex-grow container mx-auto px-4 py-8 max-w-5xl">
        <h1 class="text-4xl font-bold mb-8 text-spotify-green">Your Playlists</h1>

        @if(session('success'))
            <div class="mb-6 p-4 rounded bg-green-600 text-white">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
    <div class="mb-6 p-4 rounded bg-red-600 text-white">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


        <form id="playlistForm" method="POST" action="{{ route('playlists.store') }}" class="mb-12 bg-background-surface p-6 rounded-xl shadow-lg">
            @csrf

            <label for="name" class="block mb-2 font-semibold text-[#fafafa]">New playlist name</label>
            <input id="name" name="name" type="text" placeholder="Name" required
                class="w-full p-3 mb-4 rounded bg-background-main border border-gray-700 text-[#fafafa] focus:outline-none focus:ring-2 focus:ring-spotify-green" />

            <div class="mb-4">
                <p class="mb-2 font-semibold text-[#fafafa]">Select music to add:</p>
                <div class="max-h-64 overflow-y-auto bg-background-main p-3 rounded scrollbar-custom">
                    @foreach($music as $song)
                        <label class="flex items-center justify-between space-x-3 mb-2 cursor-pointer hover:bg-background-surface/50 rounded px-2 py-1">
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="music_ids[]" value="{{ $song->id }}" class="accent-spotify-green" />
                                <span>{{ $song->title }}</span>
                            </div>
                            <div class="text-sm text-gray-400 flex space-x-4">
                                <span>{{ $song->genre->name ?? 'Unknown Genre' }}</span>
                                <span>{{ floor($song->duration / 60) }}:{{ str_pad($song->duration % 60, 2, '0', STR_PAD_LEFT) }}</span>
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            <button type="submit"
                class="bg-spotify-green hover:bg-spotify-green-dark text-background-main font-bold py-3 px-6 rounded-xl transition-all duration-200">
                Save
            </button>
        </form>

        <section>
            <h2 class="text-3xl font-bold mb-6 text-spotify-green">Existing Playlists</h2>

            @if($playlists->isEmpty())
                <p class="text-gray-400">You have no playlists yet.</p>
            @else
                <div class="space-y-4">
                    @foreach ($playlists as $playlist)
                        @php
                            $playlistMusic = $music->whereIn('id', $playlist->music ?? []);
                            $totalDuration = $playlistMusic->sum('duration');
                            $hours = floor($totalDuration / 3600);
                            $minutes = floor(($totalDuration % 3600) / 60);
                        @endphp

                        <details class="bg-background-surface rounded-xl shadow p-4">
                            <summary class="cursor-pointer font-semibold text-xl truncate text-spotify-green select-none">
                                {{ $playlist->name }} ({{ count($playlist->music ?? []) }} songs,
                                total: {{ $hours }}u {{ str_pad($minutes, 2, '0', STR_PAD_LEFT) }}m)
                            </summary>

                            <ul class="mt-3 max-h-48 overflow-y-auto pl-5 list-disc scrollbar-custom text-[#fafafa] space-y-1">
                                @foreach ($playlistMusic as $song)
                                    <li class="flex justify-between">
                                        <span>{{ $song->title }}</span>
                                        <span class="text-sm text-gray-400">
                                            {{ $song->genre->name ?? 'Unknown Genre' }} –
                                            {{ floor($song->duration / 60) }}:{{ str_pad($song->duration % 60, 2, '0', STR_PAD_LEFT) }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>

                            <button
                                onclick='editPlaylist({{ $playlist->id }}, {!! json_encode($playlist->name) !!}, {!! json_encode($playlist->music ?? []) !!})'
                                class="mt-4 bg-spotify-green hover:bg-spotify-green-dark text-background-main font-bold py-2 px-5 rounded-xl transition-all duration-200"
                            >
                                Edit
                            </button>

                            <form method="POST" action="{{ route('playlists.destroy', $playlist->id) }}" onsubmit="return confirm('Are you sure you want to delete this playlist?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="mt-2 ml-3 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-5 rounded-xl transition-all duration-200">
                                    Delete
                                </button>
                            </form>
                        </details>

                    @endforeach
                </div>
            @endif
        </section>

        <div id="editFormWrapper" class="mt-12 hidden">
            <h2 class="text-3xl font-bold mb-4 text-spotify-green">Edit Playlist</h2>
            <form id="editPlaylistForm" method="POST" class="bg-background-surface p-6 rounded-xl shadow-lg">
                @csrf
                @method('PATCH')

                <label for="editName" class="block mb-2 font-semibold text-[#fafafa]">Naam</label>
                <input id="editName" name="name" type="text" required
                    class="w-full p-3 mb-4 rounded bg-background-main border border-gray-700 text-[#fafafa] focus:outline-none focus:ring-2 focus:ring-spotify-green" />

                <p class="mb-2 font-semibold text-[#fafafa]">Muziek selecteren:</p>
                <div class="max-h-64 overflow-y-auto bg-background-main p-3 rounded scrollbar-custom mb-4">
                    @foreach($music as $song)
                        <label class="flex items-center justify-between space-x-3 mb-2 cursor-pointer hover:bg-background-surface/50 rounded px-2 py-1">
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" class="edit-music-checkbox accent-spotify-green" name="music_ids[]" value="{{ $song->id }}">
                                <span>{{ $song->title }}</span>
                            </div>
                            <div class="text-sm text-gray-400 flex space-x-4">
                                <span>{{ $song->genre->name ?? 'Unknown Genre' }}</span>
                                <span>{{ floor($song->duration / 60) }}:{{ str_pad($song->duration % 60, 2, '0', STR_PAD_LEFT) }}</span>
                            </div>
                        </label>
                    @endforeach
                </div>

                <button type="submit"
                    class="bg-spotify-green hover:bg-spotify-green-dark text-background-main font-bold py-3 px-6 rounded-xl transition-all duration-200">
                    Update
                </button>
            </form>
        </div>

    </main>

    @include('footer')

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Validatie bij aanmaken playlist
    const createForm = document.getElementById('playlistForm');
    if (createForm) {
        createForm.addEventListener('submit', e => {
            const checked = createForm.querySelectorAll('input[name="music_ids[]"]:checked');
            if (checked.length === 0) {
                e.preventDefault();
                alert('Add at least 1 music to your playlist.');
            }
            
        });
    }

    // Validatie bij updaten playlist
    const editForm = document.getElementById('editPlaylistForm');
    if (editForm) {
        editForm.addEventListener('submit', e => {
            const checked = editForm.querySelectorAll('input[name="music_ids[]"]:checked');
            if (checked.length === 0) {
                e.preventDefault();
                alert('Add at least 1 music to your playlist.');
            }
        });
    }
});

function editPlaylist(id, name, selectedMusic) {
    document.getElementById('editFormWrapper').classList.remove('hidden');
    const form = document.getElementById('editPlaylistForm');
    const nameInput = document.getElementById('editName');
    const checkboxes = form.querySelectorAll('.edit-music-checkbox');

    form.action = `/playlists/${id}`;
    nameInput.value = name;

    // Zorg dat alle IDs numbers zijn
    selectedMusic = selectedMusic.map(id => parseInt(id));

    console.log('Selected music IDs:', selectedMusic);

    checkboxes.forEach(cb => {
        const cbValue = parseInt(cb.value);
        console.log('Checkbox value:', cb.value, 'Includes:', selectedMusic.includes(cbValue));
        cb.checked = selectedMusic.includes(cbValue);
    });

    window.scrollTo({ top: form.offsetTop - 50, behavior: 'smooth' });
}


</script>



</body>
</html>
