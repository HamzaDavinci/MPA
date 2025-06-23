<!DOCTYPE html>
<html lang="en" class="bg-background-main text-text-primary">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bugify - Browse</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen">

    <!-- Navbar -->
    @include('navbar')

    <!-- Main content -->
    <main class="flex-grow container mx-auto px-6 py-10">

        <h1 class="text-4xl font-extrabold mb-10">Browse Genres</h1>

        <div class="grid grid-cols-[repeat(auto-fit,minmax(15rem,1fr))] justify-center gap-6 mb-12 items-start">

    @foreach($genres as $genre)
        <div
            class="genre-card bg-background-surface rounded-2xl p-6 cursor-pointer min-h-[140px]
            shadow
            transition duration-300 ease-in-out transform
            hover:scale-105
            hover:bg-[#262626]
            hover:text-text-primary
            flex flex-col justify-between"
            data-genre-id="{{ $genre->id }}"
        >
            <h2 class="text-xl font-extrabold mb-2 break-words">{{ $genre->name }}</h2>
            <p class="text-gray-400 text-sm line-clamp-4 break-words">{{ $genre->description }}</p>
        </div>
    @endforeach
    
</div>

        <button
                id="show-all"
                class="bg-spotify-green text-text-primary font-semibold rounded-2xl px-8 py-3 min-w-[10px] text-center
                shadow
                transition duration-300 ease-in-out transform
                hover:scale-105
                hover:bg-spotify-green
                hover:text-text-primary
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#3c3c3c]"
            >
                Show All Music
            </button>
        

        <section class="mt-20 mb-"id="music-list">
            
            <h2 class="text-3xl font-bold mb-8 tracking-wide">
                Music in genre: <span id="selected-genre-name" class="text-spotify-green">All genres</span>
                
            </h2>
            
            <div id="music-items" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 max-h-[600px] overflow-y-auto pr-2 scrollbar-custom">
                @foreach($musics as $music)
                    <a href="{{ route('music.detailpage', ['id' => $music->id]) }}" class="music-card bg-[#181818] rounded-2xl p-4 cursor-pointer flex items-center gap-4 transition duration-300 ease-in-out hover:bg-[#282828]">
                        <div class="w-14 h-14 bg-gradient-to-br from-spotify-green to-spotify-green rounded-lg flex items-center justify-center text-black font-bold text-lg select-none">
                            {{ strtoupper(substr($music->title, 0, 2)) }}
                        </div>
                        <div class="flex flex-col">
                            <h3 class="font-semibold text-white break-words" title="{{ $music->title }}">{{ $music->title }}</h3>
                            <p class="text-gray-400 text-sm break-words" title="{{ $music->genre->name }}">{{ $music->genre->name }}</p>
                        </div>
                    </a>
                @endforeach
            </div>

        </section>
        

    </main>

    <script>
    // Laravel route met placeholder, wordt in JS vervangen door echte id
    function musicDetailUrl(id) {
        return @json(route('music.detailpage', ['id' => 'ID_PLACEHOLDER'])).replace('ID_PLACEHOLDER', id);
    }

    const musics = @json($musics);
    const musicListEl = document.getElementById('music-items');
    const genreCards = document.querySelectorAll('.genre-card');
    const selectedGenreName = document.getElementById('selected-genre-name');
    const showAllBtn = document.getElementById('show-all');

    genreCards.forEach(card => {
        card.addEventListener('click', () => {
            const genreId = parseInt(card.getAttribute('data-genre-id'));
            const filteredMusic = musics.filter(m => m.genre_id === genreId);

            selectedGenreName.textContent = card.querySelector('h2').textContent;

            musicListEl.innerHTML = '';

            if(filteredMusic.length === 0){
                musicListEl.innerHTML = '<div class="text-gray-400 col-span-full">No music found for this genre.</div>';
            } else {
                filteredMusic.forEach(m => {
                    musicListEl.innerHTML += `
                    <a href="${musicDetailUrl(m.id)}" class="music-card bg-[#181818] rounded-2xl p-4 cursor-pointer flex items-center gap-4 transition duration-300 ease-in-out hover:bg-[#282828]">
                        <div class="w-14 h-14 bg-gradient-to-br from-[#1db954] to-[#1ed760] rounded-lg flex items-center justify-center text-black font-bold text-lg select-none">
                            ${m.title.substring(0,2).toUpperCase()}
                        </div>
                        <div class="flex flex-col">
                            <h3 class="font-semibold text-white break-words" title="${m.title}">${m.title}</h3>
                            <p class="text-gray-400 text-sm break-words" title="${m.genre.name}">${m.genre.name}</p>
                        </div>
                    </a>`;
                });
            }
        });
    });

    showAllBtn.addEventListener('click', () => {
        selectedGenreName.textContent = 'All genres';
        musicListEl.innerHTML = '';
        musics.forEach(m => {
            musicListEl.innerHTML += `
            <a href="${musicDetailUrl(m.id)}" class="music-card bg-[#181818] rounded-2xl p-4 cursor-pointer flex items-center gap-4 transition duration-300 ease-in-out hover:bg-[#282828]">
                <div class="w-14 h-14 bg-gradient-to-br from-[#1db954] to-[#1ed760] rounded-lg flex items-center justify-center text-black font-bold text-lg select-none">
                    ${m.title.substring(0,2).toUpperCase()}
                </div>
                <div class="flex flex-col">
                    <h3 class="font-semibold text-white break-words" title="${m.title}">${m.title}</h3>
                    <p class="text-gray-400 text-sm break-words" title="${m.genre.name}">${m.genre.name}</p>
                </div>
            </a>`;
        });

        showAllBtn.blur();
        showAllBtn.classList.remove('focus:ring-2', 'focus:ring-offset-2', 'focus:ring-[#1db954]');
    });
</script>


    <!-- Footer -->
    @include('footer')

</body>
</html>
