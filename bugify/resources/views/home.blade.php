<!DOCTYPE html>
<html lang="en" class="bg-background-main text-[#fafafa]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bugify - Your Broken Music Hub</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen">

    <!-- Navbar -->
    @include('navbar')

    <!-- Main Content -->
    <main class="flex-1 p-10">
        <h1 class="text-4xl font-bold mb-6">Welcome to <span class="text-spotify-green font-bold">Bugify</span></h1>
        <p class="text-gray-400 mb-4">Where every song skips and the UI glitches for fun.</p>


        <h1 class="text-3xl font-bold mb-6 mt-10">Top 4 Hits</h1>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($topGenres as $genre)
                <div class="bg-background-surface rounded-2xl p-6 shadow hover:scale-105 transition-transform cursor-pointer">
                    <h2 class="text-lg font-semibold">{{ $genre->name }}</h2>
                    <p class="text-sm text-gray-500">{{ $genre->description }}</p>
                </div>
            @endforeach
        </div>

    </main>

    <!-- Footer -->
    @include('footer')

</body>
</html>
