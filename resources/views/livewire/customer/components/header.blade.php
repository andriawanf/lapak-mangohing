<header class="z-50 bg-background">
    <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="md:flex md:items-center md:gap-2">
                <img src="/images/mang-ohing-logo.png" width="50" height="50" alt="" class="object-cover">
                <div class="text-sm font-semibold text-primary leading-[120%] text-nowrap">
                    <h1>Lapak</h1>
                    <h1>Mang Ohing</h1>
                </div>
            </div>

            <div class="hidden md:block md:mr-12">
                <nav aria-label="Global">
                    <ul class="flex items-center gap-2 text-sm">
                        <a href="{{ route('dashboard') }}"
                            class="relative px-5 py-1.5 rounded-full group hover:bg-primary transition-all duration-200 ease-out text-tertiary/60 hover:text-white hover:font-medium {{ route('dashboard') == request()->url() ? 'bg-primary text-white font-medium' : '' }}">
                            <li>
                                Home
                            </li>
                        </a>
                        <a href="{{ route('product.collections') }}"
                            class="relative px-5 py-1.5 rounded-full group hover:bg-primary transition-all duration-200 ease-out">
                            <li>
                                <h1 class="transition text-tertiary/60 group-hover:text-white"> Produk </h1>
                            </li>
                        </a>
                        <a href="#"
                            class="relative px-5 py-1.5 rounded-full group hover:bg-primary transition-all duration-200 ease-out">
                            <li>
                                <h1 class="transition text-tertiary/60 group-hover:text-white"> Pre-order </h1>
                            </li>
                        </a>
                        <a href="#"
                            class="relative px-5 py-1.5 rounded-full group hover:bg-primary transition-all duration-200 ease-out">
                            <li>
                                <h1 class="transition text-tertiary/60 group-hover:text-white"> Tentang </h1>
                            </li>
                        </a>
                    </ul>
                </nav>
            </div>

            @if (auth()->check())
                <div class="flex items-center lg:space-x-4">

                    <button id="myCartDropdownButton1" data-dropdown-toggle="myCartDropdown1" type="button"
                        class="relative inline-flex items-center justify-center p-2 text-sm font-medium leading-none text-white rounded-full bg-primary hover:bg-red-800 ">
                        <span class="sr-only">
                            Cart
                        </span>
                        <i data-lucide="shopping-cart" class="w-4 h-4 stroke-2"></i>
                        <div
                            class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold bg-yellow-500 border-2 rounded-full text-tertiary border-background -top-2 -end-2">
                            1</div>
                    </button>

                    <div id="myCartDropdown1"
                        class="z-10 hidden max-w-sm p-4 mx-auto space-y-4 overflow-hidden antialiased bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="grid grid-cols-2">
                            <div>
                                <a href="#"
                                    class="text-sm font-semibold leading-none text-gray-900 truncate hover:underline">Apple
                                    iPhone 15</a>
                                <p class="mt-0.5 truncate text-sm font-normal text-gray-500">$599</p>
                            </div>

                            <div class="flex items-center justify-end gap-6">
                                <p class="text-sm font-normal leading-none text-gray-500">Qty: 1</p>

                                <button data-tooltip-target="tooltipRemoveItem1a" type="button"
                                    class="text-primary hover:text-red-800">
                                    <span class="sr-only"> Remove </span>
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div id="tooltipRemoveItem1a" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                                    Remove item
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        </div>

                        <a href="#" title=""
                            class="mb-2 me-2 inline-flex w-full items-center justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-0"
                            role="button"> Checkout </a>
                    </div>


                    <button id="dropdownAvatarNameButton" data-dropdown-toggle="userDropdown"
                        class="flex items-center text-sm font-medium text-gray-900 rounded-full pe-1 hover:text-primary md:me-0 focus:ring-0"
                        type="button">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full me-2" src="{{ asset('/images/mang-ohing-logo.png') }}"
                            alt="user photo">
                        <p class="w-20 overflow-hidden text-ellipsis text-nowrap">{{ Auth::user()->username }}</p>
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="userDropdown"
                        class="z-10 hidden w-56 overflow-hidden overflow-y-auto antialiased bg-white border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-sm ">
                        <ul class="p-2 text-sm font-medium text-tertiary text-start ">
                            <li><a href="#" title=""
                                    class="inline-flex items-center w-full gap-2 px-3 py-2 text-sm rounded-md hover:bg-gray-200 ">
                                    My Account </a></li>
                            <li><a href="#" title=""
                                    class="inline-flex items-center w-full gap-2 px-3 py-2 text-sm rounded-md hover:bg-gray-200 ">
                                    My Orders </a></li>
                            <li><a href="#" title=""
                                    class="inline-flex items-center w-full gap-2 px-3 py-2 text-sm rounded-md hover:bg-gray-200 ">
                                    Favourites </a></li>
                            <li><a href="#" title=""
                                    class="inline-flex items-center w-full gap-2 px-3 py-2 text-sm rounded-md hover:bg-gray-200 ">
                                    Delivery Addresses </a></li>
                            <li><a href="#" title=""
                                    class="inline-flex items-center w-full gap-2 px-3 py-2 text-sm rounded-md hover:bg-gray-200 ">
                                    Settings </a></li>
                        </ul>

                        <div class="p-2 text-sm font-medium text-tertiary">
                            <a href="#" title=""
                                class="inline-flex items-center w-full gap-2 px-3 py-2 text-sm rounded-md hover:bg-primary hover:text-white">
                                Sign Out </a>
                        </div>
                    </div>


                    <button type="button" data-collapse-toggle="ecommerce-navbar-menu-1"
                        aria-controls="ecommerce-navbar-menu-1" aria-expanded="false"
                        class="inline-flex items-center justify-center p-2 text-gray-900 rounded-md lg:hidden hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white">
                        <span class="sr-only">
                            Open Menu
                        </span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M5 7h14M5 12h14M5 17h14" />
                        </svg>
                    </button>
                    <div id="ecommerce-navbar-menu-1"
                        class="hidden px-4 py-3 mt-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                        <ul class="space-y-3 text-sm font-medium text-gray-900 dark:text-white">
                            <li>
                                <a href="#" class="hover:text-primary-700 dark:hover:text-primary-500">Home</a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-primary-700 dark:hover:text-primary-500">Best
                                    Sellers</a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-primary-700 dark:hover:text-primary-500">Gift
                                    Ideas</a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-primary-700 dark:hover:text-primary-500">Games</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="hover:text-primary-700 dark:hover:text-primary-500">Electronics</a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-primary-700 dark:hover:text-primary-500">Home &
                                    Garden</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button
            class="px-5 py-2 text-sm font-medium text-white rounded-full shadow bg-primary hover:bg-red-800 focus:bg-red-800"
            type="submit">
            Logout
        </button>
    </form> --}}
            @else
                <div class="flex items-center gap-4">
                    <div class="sm:flex sm:gap-2">
                        <a class="px-5 py-2 text-sm font-medium text-white rounded-full shadow bg-primary hover:bg-red-800 focus:bg-red-800"
                            href="{{ route('login') }}">
                            Login
                        </a>

                        <div class="hidden sm:flex">
                            <a class="rounded-full bg-transparent px-5 py-2 text-sm font-medium border border-[#F2F2F2] text-primary hover:border hover:border-primary focus:bg-primary focus:text-white"
                                href="{{ route('register') }}">
                                Register
                            </a>
                        </div>
                    </div>

                    <div class="block md:hidden">
                        <button class="p-2 text-gray-600 transition bg-gray-100 rounded hover:text-gray-600/75">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</header>
