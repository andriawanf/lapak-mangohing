<x-app-layout>
    <div class="relative flex flex-row">
        {{-- sidebar --}}
        <aside class="flex flex-col items-start justify-between w-full shadow-sm sidebar-container bg-primary"
            id="sidebar">
            <div class="flex flex-col w-full space-y-20">
                <div class="flex items-center justify-start gap-3">
                    <img src="/images/mang-ohing-logo.png" width="50" height="50" alt="" class="object-cover">
                    <div class="text-lg font-semibold text-white leading-[120%] text-nowrap">
                        <h1>Lapak</h1>
                        <h1>Mang Ohing</h1>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <x-nav-link :href="route('dashboard.admin')" :active="request()->routeIs('dashboard.admin')" class="flex items-center justify-start gap-2">
                        <i data-lucide="layout-grid" class="stroke-1"></i>
                        {{-- <img src="/icons/layout-grid.svg" width="24" height="24" alt=""> --}}
                        <h1>Dasboard</h1>
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard.admin.products')" :active="request()->routeIs('dashboard.admin.products')" class="flex items-center justify-start gap-2">
                        <i data-lucide="shopping-basket"
                            class="transition-all stroke-1 stroke-white/80 group-hover:stroke-tertiary "></i>
                        {{-- <img src="/icons/shopping-basket.svg" width="24" height="24" alt=""> --}}
                        <h1>Orders</h1>
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard.admin.products')" :active="request()->routeIs('dashboard.admin.products')" class="flex items-center justify-start gap-2">
                        <i data-lucide="shopping-bag"
                            class="transition-all stroke-1 stroke-white/80 group-hover:stroke-tertiary "></i>
                        <h1>Products</h1>
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard.admin.products')" :active="request()->routeIs('dashboard.admin.products')" class="flex items-center justify-start gap-2">
                        <i data-lucide="layout-list"
                            class="transition-all stroke-1 stroke-white/80 group-hover:stroke-tertiary "></i>
                        <h1>Categories</h1>
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard.admin.products')" :active="request()->routeIs('dashboard.admin.products')" class="flex items-center justify-start gap-2">
                        <i data-lucide="star"
                            class="transition-all stroke-1 stroke-white/80 group-hover:stroke-tertiary "></i>
                        <h1>Reviews</h1>
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard.admin.products')" :active="request()->routeIs('dashboard.admin.products')" class="flex items-center justify-start gap-2">
                        <i data-lucide="users"
                            class="transition-all stroke-1 stroke-white/80 group-hover:stroke-tertiary "></i>
                        <h1>Users</h1>
                    </x-nav-link>
                    <hr class="bg-white/20 border-1 border-white/20">
                    <x-nav-link :href="route('dashboard.admin.products')" :active="request()->routeIs('dashboard.admin.products')" class="flex items-center justify-start gap-2">
                        <i data-lucide="circle-user-round"
                            class="transition-all stroke-1 stroke-white/80 group-hover:stroke-tertiary "></i>
                        <h1>Profile</h1>
                    </x-nav-link>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <x-primary-button
                    class="w-full bg-[#e93b3c] text-white py-2.5 focus:bg-[#a52a2b] active:bg-[#a52a2b] flex items-center justify-center gap-2">
                    <i data-lucide="log-out"
                        class="transition-all stroke-2 stroke-white/80 group-hover:stroke-tertiary "></i>
                    <h1>Logout</h1>
                </x-primary-button>
            </form>
        </aside>
        <div class="relative w-full bg-gradient-to-r from-white to-primary/10">
            <nav class="z-30 w-full bg-white shadow-sm ">
                <div class="px-3 py-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center justify-start">
                            <button id="toggleSidebar" aria-expanded="true" aria-controls="sidebar"
                                class="p-2 text-white rounded cursor-pointer bg-primary">
                                <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <form action="#" method="GET" class="hidden lg:block lg:pl-3.5">
                            <label for="topbar-search" class="sr-only">Search</label>
                            <div class="relative mt-1 lg:w-96">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" name="email" id="topbar-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full pl-10 p-2.5 "
                                    placeholder="Search">
                            </div>
                        </form>
                        <div class="flex items-center gap-6">
                            <div class="p-2">
                                <img src="/icons/bell.svg" alt="" class="object-cover">
                            </div>
                            <a href="#" class="flex items-center gap-2">
                                <img alt=""
                                    src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                                    class="object-cover rounded-full size-10" />

                                <div>
                                    <p class="text-xs">
                                        <strong class="block font-medium">{{ Auth::user()->name }}</strong>

                                        <span> {{ Auth::user()->email }}</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <section></section>
        </div>
    </div>
</x-app-layout>
