<x-guest-layout :title="'Bugify - Forgot Password'">
    <main class="flex-1 p-10 max-w-lg mx-auto w-full">
        <h1 class="text-4xl font-bold mb-6 text-spotify-green text-center">Forgot Password</h1>

        <div class="mb-6 text-sm text-gray-400 leading-relaxed">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <x-auth-session-status class="mb-6" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="bg-background-surface p-6 rounded-2xl shadow-md">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="mb-2" />
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

            <div class="flex items-center justify-end mt-6">
                <x-primary-button
                    class="bg-gradient-to-r from-[#1db954] to-[#17a447] text-white px-8 h-12 w-56 rounded-xl
                           shadow-md hover:from-[#17a447] hover:to-[#1db954] transition-colors duration-300
                           focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1db954]
                           flex items-center justify-center whitespace-nowrap"
                >
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </main>
</x-guest-layout>
