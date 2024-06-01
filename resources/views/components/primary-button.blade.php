<button
    {{ $attributes->merge(['type' => 'submit', 'class' => ' px-4 py-2 rounded-md font-semibold text-xs  uppercase tracking-widest  focus:outline-none transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
