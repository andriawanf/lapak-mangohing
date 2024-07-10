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

            <div class="hidden md:block md:ms-20">
                <nav aria-label="Global">
                    <ul class="flex items-center gap-2 text-sm">
                        <a href="{{ route('dashboard') }}"
                            class="relative px-5 py-1.5 rounded-full group hover:bg-primary transition-all duration-200 ease-out text-tertiary/60 hover:text-white hover:font-medium {{ route('dashboard') == request()->url() ? 'bg-primary text-white font-medium' : '' }}">
                            <li>
                                Home
                            </li>
                        </a>
                        <a href="{{ route('product.collections') }}"
                            class="relative px-5 py-1.5 rounded-full group hover:bg-primary transition-all duration-200 ease-out text-tertiary/60 hover:text-white hover:font-medium {{ route('product.collections') == request()->url() || route('product.collections.search') == request()->url() ? 'bg-primary text-white font-medium' : '' }}">
                            <li>
                                Produk
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

                    <button data-drawer-target="drawer-my-cart" data-drawer-show="drawer-my-cart"
                        data-drawer-placement="right" aria-controls="drawer-my-cart" id="myCart" type="button"
                        class="relative inline-flex items-center justify-center p-2 text-sm font-medium leading-none text-white rounded-full bg-primary hover:bg-red-800 ">
                        <span class="sr-only">
                            Cart
                        </span>
                        <i data-lucide="shopping-cart" class="w-4 h-4 stroke-2"></i>
                        <div
                            class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold bg-yellow-500 border-2 rounded-full text-tertiary border-background -top-2 -end-2">
                            {{ $cartCount }}</div>
                    </button>

                    <!-- drawer component -->
                    <div id="drawer-my-cart"
                        class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white max-w-80 md:min-w-96"
                        tabindex="-1" aria-labelledby="drawer-right-label">
                        <h3 class="text-lg font-bold text-tertiary">Keranjang ({{ $cartCount }})</h3>
                        <button type="button" data-drawer-hide="drawer-my-cart" aria-controls="drawer-my-cart"
                            class="text-tertiary bg-transparent hover:bg-gray-200 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close menu</span>
                        </button>

                        <hr class="my-4" />
                        @foreach ($dataCart as $data)
                            <div class="flex items-start gap-2">
                                <img src="{{ $data['product']['images'] ? asset('storage/images/products/' . $data['product']['images'][0]['url']) : asset('/storage/images/products/default-product.png') }}"
                                    alt="image-product" class="object-cover rounded size-16">
                                <div class="w-full">
                                    <div>
                                        <p class="text-sm font-normal text-tertiary/60">
                                            {{ $data['product']['product_category'] }}</p>
                                        <a href="#"
                                            class="text-sm font-semibold mt-1 text-gray-900 w-full hover:underline line-clamp-1">{{ $data['product']['product_name'] }}</a>
                                        <p class="text-xs font-normal text-tertiary/60 mt-1 line-clamp-1">Tag:
                                            {{ $data['product']['product_tag'] }}</p>
                                        @if (count($data['product']['discounts']) > 0)
                                            <p class="text-xs font-normal text-primary mt-1 line-clamp-1">Diskon:
                                                {{ number_format($data['product']['discounts']->first()->discount_percentage) }}%
                                            </p>
                                        @else
                                            <p class="text-xs font-normal text-tertiary/60 mt-1 line-clamp-1">Harga
                                                terbaik</p>
                                        @endif
                                    </div>

                                    <div class="flex items-center justify-between gap-2 mt-4">
                                        <div class="relative flex items-center">
                                            <p class="text-sm font-medium text-tertiary">Qty: {{ $data['quantity'] }}
                                                pcs
                                            </p>
                                        </div>
                                        <p class="font-bold text-md text-tertiary">
                                            Rp. {{ number_format($data['subtotal'], 0, ',', '.') }}</p>
                                    </div>

                                    <div class="flex justify-end mt-2">
                                        <button data-modal-target="deleteCart-{{ $data['id'] }}"
                                            data-modal-toggle="deleteCart-{{ $data['id'] }}" type="button"
                                            class="text-xs font-normal text-primary hover:underline">
                                            Remove item
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                        @endforeach

                        <div>
                            <div class="flex items-center justify-between w-full text-base font-semibold text-tertiary">
                                <p>Diskon:</p>
                                <p class="ms-3">{{ number_format($discount) }}%</p>
                            </div>
                            <div
                                class="flex items-center justify-between w-full text-base font-semibold text-tertiary mt-2">
                                <p>Subtotal:</p>
                                <p class="ms-3">Rp. {{ number_format($subtotal, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="w-full mt-6">
                            <a href="{{ route('product.myCart') }}"
                                class="mb-2 inline-flex w-full h-fit items-center justify-center rounded-lg border border-primary bg-transparent px-5 py-2.5 text-sm font-medium text-primary hover:text-white hover:bg-primary focus:outline-none focus:bg-red-800"
                                role="button"> View all ({{ $cartCount }}) </a>
                            <a href="#" title=""
                                class="mb-2 inline-flex w-full h-fit items-center justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-0"
                                role="button"> Checkout </a>
                            <a href="{{ route('product.collections') }}">
                                <p
                                    class="w-full text-xs font-normal text-center hover:underline text-tertiary hover:text-primary">
                                    Continue
                                    shopping</p>
                            </a>
                        </div>
                    </div>

                    {{-- Modal Delete Cart --}}
                    @foreach ($dataCart as $data)
                        <div id="deleteCart-{{ $data['id'] }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full p-4">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                        data-modal-hide="deleteCart-{{ $data['id'] }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 text-center md:p-5">
                                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 ">
                                            Are you sure you want to delete <span
                                                class="font-bold text-primary">{{ $data['product']['product_name'] }}</span>
                                            ?
                                        </h3>
                                        <form action="{{ route('product.collections.deleteCart', $data['id']) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-0 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Yes, I'm sure
                                            </button>
                                            </fo>
                                            <button data-modal-hide="deleteCart-{{ $data['id'] }}" type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-0 focus:ring-gray-100 ">No,
                                                cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <button id="dropdownAvatarNameButton" data-dropdown-toggle="userDropdown"
                        class="flex items-center text-sm font-medium text-gray-900 rounded-full pe-1 hover:text-primary md:me-0 focus:ring-0"
                        type="button">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full me-2" src="{{ asset('/images/mang-ohing-logo.png') }}"
                            alt="user photo">
                        <p class="w-20 overflow-hidden text-ellipsis text-nowrap">{{ Auth::user()->username }}</p>
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="userDropdown"
                        class="z-10 hidden w-56 overflow-hidden overflow-y-auto antialiased bg-white border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-sm ">
                        <ul class="p-2 text-sm font-medium text-tertiary text-start ">
                            <li><a href="#" title=""
                                    class="inline-flex items-center w-full gap-2 px-3 py-2 text-sm rounded-md hover:bg-gray-200 ">
                                    Account </a></li>
                            <li><a href="#" title=""
                                    class="inline-flex items-center w-full gap-2 px-3 py-2 text-sm rounded-md hover:bg-gray-200 ">
                                    Preorders </a></li>
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
