<x-guest-layout title="Bugify - Confirm Password">
    <main class="flex-1 p-10 max-w-lg mx-auto w-full">
        <h1 class="text-4xl font-bold mb-6 text-spotify-green text-center">
            Confirm Password
        </h1>

        <div class="mb-6 text-sm text-gray-400 leading-relaxed text-center">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}" class="bg-background-surface p-6 rounded-2xl shadow-md">
            @csrf

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="mb-2" />

                <x-text-input id="password"
                    class="block mt-1 w-full bg-[#171717] text-[#fafafa] border border-[#1db954] rounded-lg px-4 py-2
                           placeholder:text-[#a0a0a0] placeholder:opacity-70
                           focus:outline-none focus:ring-2 focus:ring-[#1db954]"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-6">
                <x-primary-button class="w-full font-bold py-2 px-4">
                    {{ __('Confirm') }}
                </x-primary-button>
            </div>
        </form>
    </main>
</x-guest-layout>
