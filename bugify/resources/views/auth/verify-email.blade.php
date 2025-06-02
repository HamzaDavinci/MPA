<x-guest-layout title="Bugify - Verify Email">
    <main class="flex-1 p-10 max-w-lg mx-auto w-full">
        <h1 class="text-4xl font-bold mb-6 text-spotify-green text-center">
            Verify Your Email
        </h1>

        <div class="mb-6 text-sm text-gray-400 leading-relaxed text-center">
            {{ __("Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.") }}
        </div>

        @if (session('status') === 'verification-link-sent')
            <div class="mb-6 text-sm font-medium text-green-500 text-center">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="flex gap-4 justify-center mt-6">
            <!-- Resend -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <x-primary-button class="w-full font-bold py-2 px-4">
                    {{ __('Resend Email') }}
                </x-primary-button>
            </form>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full font-bold py-2 px-4 bg-transparent border border-[#1db954] text-[#1db954] rounded-lg hover:bg-[#1db954] hover:text-[#fafafa] transition-all duration-200">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </main>
</x-guest-layout>
