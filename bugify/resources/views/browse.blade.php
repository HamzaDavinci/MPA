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

    <!-- Main content -->
    <main class="flex-grow container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Browse Genres</h1>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @foreach($genres as $genre)
                <div class="bg-background-surface rounded-2xl p-6 shadow hover:scale-105 transition-transform cursor-pointer">
                    <h2 class="text-xl font-semibold">{{ $genre->name }}</h2>
                    <p class="text-sm text-gray-400 mt-1">{{ $genre->description }}</p>
                </div>
            @endforeach
        </div>
    </main>

    <!-- Footer -->
    @include('footer')

</body>
</html>
