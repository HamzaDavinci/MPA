<x-guest-layout :title="'Bugify - Register'">
    <main class="flex-1 p-10 max-w-lg mx-auto w-full">
        <h1 class="text-4xl font-bold mb-6 text-spotify-green text-center">Create an Account</h1>

        <form method="POST" action="{{ route('register') }}" class="bg-background-surface p-6 rounded-2xl shadow-md">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" class="mb-2" />
                <x-text-input
                    id="name"
                    class="block w-full bg-[#171717] text-[#fafafa] border border-[#1db954] rounded-lg px-4 py-2
                           placeholder:text-[#a0a0a0] placeholder:opacity-70
                           focus:outline-none focus:ring-2 focus:ring-[#1db954]"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Your name"
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="mb-2" />
                <x-text-input
                    id="email"
                    class="block w-full bg-[#171717] text-[#fafafa] border border-[#1db954] rounded-lg px-4 py-2
                           placeholder:text-[#a0a0a0] placeholder:opacity-70
                           focus:outline-none focus:ring-2 focus:ring-[#1db954]"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username"
                    placeholder="your.email@example.com"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="mb-2" />
                <x-text-input
                    id="password"
                    class="block w-full bg-[#171717] text-[#fafafa] border border-[#1db954] rounded-lg px-4 py-2
                           placeholder:text-[#a0a0a0] placeholder:opacity-70
                           focus:outline-none focus:ring-2 focus:ring-[#1db954]"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="••••••••"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="mb-2" />
                <x-text-input
                    id="password_confirmation"
                    class="block w-full bg-[#171717] text-[#fafafa] border border-[#1db954] rounded-lg px-4 py-2
                           placeholder:text-[#a0a0a0] placeholder:opacity-70
                           focus:outline-none focus:ring-2 focus:ring-[#1db954]"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="••••••••"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-spotify-green transition">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button
                    class="bg-gradient-to-r from-[#1db954] to-[#17a447] text-white font-bold px-8 h-12 w-56 rounded-xl
                           shadow-md hover:from-[#17a447] hover:to-[#1db954] transition-colors duration-300
                           focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1db954]
                           flex items-center justify-center whitespace-nowrap"
                >
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </main>
</x-guest-layout>
