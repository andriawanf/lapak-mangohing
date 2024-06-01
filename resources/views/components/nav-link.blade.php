@props(['active'])
@props(['href'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-4 py-2.5 bg-white rounded-lg text-sm font-medium leading-[120%] text-tertiary focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-4 py-2.5 text-sm font-normal leading-[120%] text-white/80 hover:text-tertiary hover:bg-white hover:font-medium hover:rounded-lg focus:outline-none transition duration-150 ease-in-out rounded-lg group';
@endphp

<a wire:navigate href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
