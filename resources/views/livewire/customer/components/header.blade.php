<header class="bg-[#F2F2F2] z-50">
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
                        <a href="#"
                            class="relative px-5 py-1.5 rounded-full group hover:bg-primary transition-all duration-200 ease-out text-tertiary/60 hover:text-white {{ route('dashboard') == request()->url() ? 'bg-primary text-white' : '' }}">
                            <li>
                                Home
                            </li>
                        </a>
                        <a href="#"
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
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        class="px-5 py-2 text-sm font-medium text-white rounded-full shadow bg-primary hover:bg-red-800 focus:bg-red-800"
                        type="submit">
                        Logout
                    </button>
                </form>
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</header>
