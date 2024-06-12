<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @livewireStyles --}}
</head>

<body class="antialiased font-poppins bg-gradient-to-r from-white to-[#d43637]/10">
    <nav class="fixed z-50 w-full sm:py-2">
        <div class="container py-3 mx-auto">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <a href="/" class="flex ml-4">
                        <img src="/images/mang-ohing-logo.png" class="h-8 mr-3" alt="Flowbite Logo" />
                        <span class="self-center text-xl font-semibold text-[#d43637] whitespace-nowrap">Lapak Mang
                            Ohing</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0">
        <div class="w-full px-6 overflow-hidden sm:max-w-md sm:rounded-lg lg:max-w-xl">
            {{ $slot }}
        </div>

    </div>
    {{-- @livewireScripts --}}
</body>

</html>
