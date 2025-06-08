<nav class="bg-background-surface px-4 py-3 flex items-center justify-between relative z-50">
    <!-- Logo -->
    <a href="/">
        <img src="{{ asset('media/bugify-logo.png') }}" alt="Bugify Logo" class="h-16">
    </a>

    <!-- Hamburger -->
    <button id="menu-toggle" class="md:hidden flex flex-col justify-center items-center w-10 h-10 group" aria-label="Menu toggle" aria-expanded="false" aria-controls="menu">
        <span class="bg-spotify-green block w-6 h-0.5 mb-1 transition-transform duration-300 group-[.open]:rotate-45 group-[.open]:translate-y-1.5"></span>
        <span class="bg-spotify-green block w-6 h-0.5 mb-1 transition-opacity duration-300 group-[.open]:opacity-0"></span>
        <span class="bg-spotify-green block w-6 h-0.5 transition-transform duration-300 group-[.open]:-rotate-45 group-[.open]:-translate-y-1.5"></span>
    </button>

    <!-- Menu -->
    <ul id="menu" 
        class="md:flex flex-col md:flex-row md:items-center md:gap-8 gap-4 absolute md:static top-full left-0 w-full md:w-auto bg-background-surface md:bg-transparent px-6 py-4 md:py-0 md:px-0 shadow md:shadow-none overflow-hidden max-h-0 opacity-0 md:max-h-full md:opacity-100 transition-[max-height,opacity] duration-300 ease-in-out text-xl font-bold z-40">
        <li><a href="/" class="text-spotify-green hover:text-white transition">Home</a></li>
        <li><a href="/browse" class="text-spotify-green hover:text-white transition">Browse</a></li>
        <li><a href="/playlists" class="text-spotify-green hover:text-white transition">Playlists</a></li>
        @guest
            <li><a href="{{ route('login') }}" class="text-spotify-green hover:text-white transition mr-8">Login</a></li>
        @else
            <li><a href="/dashboard" class="text-spotify-green hover:text-white transition mr-8">{{ Auth::user()->name }}</a></li>
        @endguest
    </ul>
</nav>

<script>
    const toggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');

    toggle.addEventListener('click', () => {
        const isOpen = toggle.classList.contains('open');

        if (isOpen) {
            toggle.classList.remove('open');
            menu.style.maxHeight = '0';
            menu.style.opacity = '0';
            toggle.setAttribute('aria-expanded', 'false');
        } else {
            toggle.classList.add('open');
            menu.style.maxHeight = menu.scrollHeight + 'px';
            menu.style.opacity = '1';
            toggle.setAttribute('aria-expanded', 'true');
        }
    });

    // Bij resize naar desktop altijd menu tonen en hamburger resetten
    window.addEventListener('resize', () => {
        if(window.innerWidth >= 768) {
            menu.style.maxHeight = null;
            menu.style.opacity = '1';
            toggle.classList.remove('open');
            toggle.setAttribute('aria-expanded', 'false');
        } else {
            if(!toggle.classList.contains('open')){
                menu.style.maxHeight = '0';
                menu.style.opacity = '0';
            }
        }
    });
</script>
