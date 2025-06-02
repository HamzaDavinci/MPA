@props(['title' => 'Bugify'])

<!DOCTYPE html>
<html lang="en" class="bg-background-main text-[#fafafa] font-sans">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title ?? 'Bugify' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col">

    {{-- Optioneel: navbar hier als je die in de guest-layout wil --}}
    @include('navbar')

    <main class="flex-1 max-w-lg w-full mx-auto p-6 sm:p-10">
        {{ $slot }}
    </main>

    {{-- Optioneel: footer hier als je die in de guest-layout wil --}}
    @include('footer')

</body>
</html>

