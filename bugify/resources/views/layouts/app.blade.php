<!DOCTYPE html>
<html lang="en" class="bg-background-main text-[#fafafa] font-sans">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title ?? 'Bugify' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col">

    {{-- Navbar --}}
    @include('navbar')

    {{-- Optioneel: Flash messages of alerts --}}
    @if (session('status'))
        <div class="bg-green-600 text-white text-center py-2">
            {{ session('status') }}
        </div>
    @endif

    {{-- Header als het meegegeven is --}}
    @if (isset($header))
        <header class="bg-background-surface shadow p-6 rounded-xl max-w-7xl mx-auto w-full mt-6">
            {{ $header }}
        </header>
    @endif

    {{-- Hoofdinhoud --}}
    <main class="flex-1 max-w-7xl mx-auto w-full p-6 sm:p-10 mt-6">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    @include('footer')

</body>
</html>
