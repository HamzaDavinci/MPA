<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Hosting Website')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav>
        <div class="logo">HostingSite</div>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/domains') }}">Domains</a></li>
            <li><a href="{{ url('/web-hosting') }}">Web Hosting</a></li>
            <li><a href="{{ url('/game-servers') }}">Game Servers</a></li>
            <li><a href="{{ url('/vps') }}">VPS</a></li>
            <li><a href="{{ url('/dedicated-servers') }}">Dedicated Servers</a></li>
            <li><a href="{{ url('/more') }}">More</a></li>
        </ul>
        <a href="{{ url('/login') }}" class="btn-login">Login</a>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
