<input
    {{ $attributes->merge([
        'class' => 'block w-full rounded-lg border border-[#1db954] bg-[#171717] text-[#fafafa] px-4 py-2
                     placeholder:text-[#a0a0a0] placeholder:opacity-70
                     focus:outline-none focus:ring-2 focus:ring-[#1db954]'
    ]) }}
    {{ $attributes->except('class') }}
/>
