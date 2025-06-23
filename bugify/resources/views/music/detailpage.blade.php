<!DOCTYPE html>
<html lang="en" class="bg-background-main text-[#fafafa]">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bugify - Detailpage</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen">

    <!-- Navbar -->
    @include('navbar')

    <main class="flex-grow container mx-auto px-6 py-12">
        <div class="max-w-3xl mx-auto bg-[#1e1e1e] rounded-3xl p-10 shadow-lg">
            <h1 class="text-5xl font-bold mb-6 tracking-tight">{{ $music->title }}</h1>
            <div class="space-y-4 text-gray-300">
                <p><span class="font-semibold text-spotify-green">Band:</span> {{ $music->band->name }}</p>
                <p><span class="font-semibold text-spotify-green">Release date:</span> {{ \Carbon\Carbon::parse($music->release_date)->format('d M Y') }}</p>
                <p><span class="font-semibold text-spotify-green">Duration:</span> {{ gmdate('i:s', $music->duration) }} minutes</p>
                <p><span class="font-semibold text-spotify-green">Discription:</span> <br />{{ $music->bio }}</p>
            </div>

            <button
                onclick="history.back()"
                class="mt-10 bg-spotify-green text-text-primary font-semibold rounded-2xl px-8 py-3
                shadow transition duration-300 ease-in-out transform
                hover:scale-105 hover:bg-[#1ed760] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#3c3c3c]"
            >
                Go Back
            </button>
        </div>
    </main>

    <!-- Footer -->
    @include('footer')

</body>
</html>
