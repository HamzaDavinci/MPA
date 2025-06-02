<x-guest-layout :title="'Bugify - Login'">
    <main class="flex-1 p-10 max-w-lg mx-auto w-full">
        <h1 class="text-4xl font-bold mb-6 text-spotify-green text-center">Bugify Login</h1>

        {{-- Session Status --}}
        <x-auth-session-status class="mb-4" :status="session('status')" />

        {{-- Login form --}}
        <form method="POST" action="{{ route('login') }}" class="bg-background-surface p-6 rounded-2xl shadow-md">
            @csrf

            {{-- Email --}}
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full bg-[#171717] text-[#fafafa] border border-[#1db954] rounded-lg px-4 py-2
                           placeholder:text-[#a0a0a0] placeholder:opacity-70
                           focus:outline-none focus:ring-2 focus:ring-[#1db954]"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="your.email@example.com"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- Password --}}
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input
                    id="password"
                    class="block mt-1 w-full bg-[#171717] text-[#fafafa] border border-[#1db954] rounded-lg px-4 py-2
                           placeholder:text-[#a0a0a0] placeholder:opacity-70
                           focus:outline-none focus:ring-2 focus:ring-[#1db954]"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            {{-- Remember me --}}
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-[#1db954] shadow-sm focus:ring-[#1db954]"
                    />
                    <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            {{-- Buttons and links --}}
            <div class="flex justify-between items-center mt-6 gap-x-4">
                <x-primary-button
                    class="bg-gradient-to-r from-[#1db954] to-[#17a447] text-white px-8 h-12 w-40 rounded-xl
                        shadow-md hover:from-[#17a447] hover:to-[#1db954] transition-colors duration-300
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1db954] leading-none flex items-center justify-center"
                >
                    {{ __('Log in') }}
                </x-primary-button>

                <a href="{{ route('register') }}"
                class="inline-flex items-center justify-center px-8 h-12 w-40 border border-[#1db954] rounded-xl
                    text-[#1db954] font-semibold text-base leading-none
                    hover:bg-[#1db954] hover:text-[#171717] transition-colors duration-200
                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1db954]"
                >
                    {{ __('Register') }}
                </a>
            </div>



            @if (Route::has('password.request'))
                <div class="mt-4 text-right">
                    <a
                        href="{{ route('password.request') }}"
                        class="underline text-sm text-gray-400 hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1db954]"
                    >
                        {{ __('Forgot your password?') }}
                    </a>
                </div>
            @endif
        </form>
    </main>
</x-guest-layout>
