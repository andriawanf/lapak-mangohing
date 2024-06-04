@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border border-gray-300 focus:border-[#d43637] focus:ring-[#d43637] rounded-md shadow-sm',
]) !!}>
