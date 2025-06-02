<!DOCTYPE html>
<html lang="en" class="bg-background-main text-[#fafafa]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bugify - Home</title>
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-7">
            @foreach($topGenres as $genre)
                <div class="bg-background-surface rounded-2xl ml-2 mr-2 p-6 shadow hover:scale-105 transition-transform cursor-pointer">
                    <h2 class="text-lg font-semibold">{{ $genre->name }}</h2>
                    <p class="text-sm text-gray-500">{{ $genre->description }}</p>
                </div>
            @endforeach
        </div>

        
        <div class="my-32 text-center max-w-3xl mx-auto">
            <h2 class="text-2xl font-bold mb-6">Create your own glitchy playlist</h2>
            <p class="text-gray-400 text-sm mb-8">
                Log in to access your personal dashboard and build your unique, buggy playlist.<br>
                Save tracks, mix chaos with music, and experience Bugify the way it was meant to be – personal and delightfully broken.
            </p>
            <a href="{{ route('login') }}" class="inline-block bg-spotify-green text-black font-semibold px-6 py-2 rounded-full shadow hover:bg-green-400 transition-colors">
                Log in and start your playlist
            </a>
        </div>



                <h1 class="text-3xl font-bold mb-6 mt-12">User Reviews</h1>

        <div class="mb-14 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 ">
            <!-- Review 1 -->
            <div class="bg-background-surface rounded-2xl p-6 shadow hover:scale-105 transition-transform cursor-pointer">
                <div class="flex items-center mb-4">
                    <img src="{{ asset('images/user1.jpg') }}" alt="Review 1" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <p class="font-semibold">zoviel</p>
                        <p class="text-xs text-gray-500">Posted on June 2, 2025</p>
                    </div>
                </div>
                <p class="text-sm text-gray-300">lolo is a FAGGOT.</p>
            </div>

            <!-- Review 2 -->
            <div class="bg-background-surface rounded-2xl p-6 shadow hover:scale-105 transition-transform cursor-pointer">
                <div class="flex items-center mb-4">
                    <img src="{{ asset('images/user2.jpg') }}" alt="Review 2" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <p class="font-semibold">jxil.</p>
                        <p class="text-xs text-gray-500">Posted on June 3, 2025</p>
                    </div>
                </div>
                <p class="text-sm text-gray-300">SHES SO CUTE UIHSFEFHUSEDHF.</em></p>
            </div>

            <!-- Review 3 -->
            <div class="bg-background-surface rounded-2xl p-6 shadow hover:scale-105 transition-transform cursor-pointer">
                <div class="flex items-center mb-4">
                    <img src="{{ asset('images/user3.jpg') }}" alt="Review 3" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <p class="font-semibold">castoxi</p>
                        <p class="text-xs text-gray-500">Posted on June 3, 2025</p>
                    </div>
                </div>
                <p class="text-sm text-gray-300">bacon bacon bacon.</p>
            </div>

            <!-- Review 4 -->
            <div class="bg-background-surface rounded-2xl p-6 shadow hover:scale-105 transition-transform cursor-pointer">
                <div class="flex items-center mb-4">
                    <img src="{{ asset('images/user4.jpg') }}" alt="Review 4" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <p class="font-semibold">milky_madness</p>
                        <p class="text-xs text-gray-500">Posted on June 3, 2025</p>
                    </div>
                </div>
                <p class="text-sm text-gray-300">is this weird enough.</p>
            </div>
            
            <!-- Review 5 -->
            <div class="bg-background-surface rounded-2xl p-6 shadow hover:scale-105 transition-transform cursor-pointer">
                <div class="flex items-center mb-4">
                    <img src="{{ asset('images/user5.jpg') }}" alt="Review 4" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <p class="font-semibold">hamzq</p>
                        <p class="text-xs text-gray-500">Posted on may 28, 2025</p>
                    </div>
                </div>
                <p class="text-sm text-gray-300">They did not find a way.</p>
            </div>
        </div>


    </main>

    <!-- Footer -->
    @include('footer')

</body>
</html>
