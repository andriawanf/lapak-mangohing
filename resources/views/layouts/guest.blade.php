<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/mang-ohing-logo.png') }}">

    <title>{{ config('app.name', 'Mang Ohing') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/styles.css', 'resources/js/app.js', 'resources/js/global-script.js'])
    @livewireStyles
</head>

<body class="antialiased font-poppins bg-[#f2f2f2] relative">
    <livewire:customer.components.header />

    {{ $slot }}
    @livewireScripts
    <!-- Development version -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/pagedone@1.1.2/src/js/pagedone.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
        lucide.createIcons();
    </script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: -10,
            slidesPerView: 3,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 32,
            thumbs: {
                swiper: swiper,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <script>
        var swiper = new Swiper(".teamswiper", {
            slidesPerView: 1,
            spaceBetween: 32,
            centeredSlides: false,
            slidesPerGroupSkip: 1,
            grabCursor: true,
            loop: true,
            keyboard: {
                enabled: true,
            },
            breakpoints: {
                769: {
                    slidesPerView: 2,
                    slidesPerGroup: 1,
                },
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            scrollbar: {
                el: ".swiper-scrollbar",
            },
            pagination: {
                el: ".swiper-pagination",
                type: "fraction",
            },
        });
    </script>
</body>

</html>
