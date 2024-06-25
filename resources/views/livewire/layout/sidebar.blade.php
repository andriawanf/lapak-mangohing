<aside class="flex flex-col items-start justify-between w-full shadow-sm sidebar-container bg-primary" id="sidebar">
    <div class="flex flex-col w-full space-y-20">
        <div class="flex items-center justify-start gap-3">
            <img src="/images/mang-ohing-logo.png" width="50" height="50" alt="" class="object-cover">
            <div class="text-lg font-semibold text-white leading-[120%] text-nowrap">
                <h1>Lapak</h1>
                <h1>Mang Ohing</h1>
            </div>
        </div>
        <ul class="flex flex-col gap-2">
            <li class="w-full">
                <x-nav-link :href="route('dashboard.admin')" :active="request()->routeIs('dashboard.admin')" class="flex items-center justify-start w-full gap-2">
                    <i data-lucide="layout-grid" class="w-4 h-4 stroke-1"></i>
                    {{-- <img src="/icons/layout-grid.svg" width="24" height="24" alt=""> --}}
                    <h1>Dasboard</h1>
                </x-nav-link>
            </li>
            <li class="w-full">
                <x-nav-link :href="route('dashboard.admin.orders')" :active="request()->routeIs('dashboard.admin.orders')" class="flex items-center justify-start w-full gap-2">
                    <i data-lucide="scroll-text"
                        class="transition-all stroke-1 w-4 h-4 {{ request()->routeIs('dashboard.admin.orders') ? 'stroke-tertiary' : 'stroke-white/80 group-hover:stroke-tertiary' }} "></i>
                    {{-- <img src="/icons/shopping-basket.svg" width="24" height="24" alt=""> --}}
                    <h1>Orders</h1>
                </x-nav-link>
            </li>
            <li class="w-full">
                <button type="button" id="dropdown-product"
                    class="flex w-full items-center justify-between px-4 py-2.5 text-sm  leading-[120%] {{ str_contains(request()->route()->getName(), 'products') ? 'text-white font-normal' : 'text-white/80 font-normal' }}  hover:text-tertiary hover:bg-white hover:font-medium hover:rounded-lg focus:outline-none transition duration-150 ease-in-out rounded-lg group"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example"
                    data-collapse-active="text-white/80 font-semibold {{ str_contains(request()->route()->getName(), 'products') ? 'text-white' : '' }}">
                    <i data-lucide="shopping-cart"
                        class="transition-all  w-4 h-4 {{ str_contains(request()->route()->getName(), 'products') ? 'stroke-white group-hover:stroke-tertiary stroke-2' : 'stroke-1 stroke-white/80 group-hover:stroke-tertiary' }}"></i>
                    <span class="flex-1 text-left ms-3 rtl:text-right whitespace-nowrap">Product</span>
                    <svg class="w-3 h-3 transition-transform  {{ str_contains(request()->route()->getName(), 'products') ? 'rotate-180' : '' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" id="dropdown-arrow"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example"
                    class="py-2 space-y-2 {{ str_contains(request()->route()->getName(), 'products') ? '' : 'hidden' }}">
                    <li>
                        <x-nav-link :href="route('dashboard.admin.products.list')" :active="request()->routeIs('dashboard.admin.products.list')" class="w-full pl-11">
                            <h1>Products List</h1>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link :href="route('dashboard.admin.products.discount')" :active="request()->routeIs('dashboard.admin.products.discount')" class="w-full pl-11">
                            <h1>Discounts</h1>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link :href="route('dashboard.admin.products.inventory')" :active="request()->routeIs('dashboard.admin.products.inventory')" class="w-full pl-11">
                            <h1>Inventory</h1>
                        </x-nav-link>
                    </li>
                </ul>
            </li>
            <li class="w-full">
                <x-nav-link :href="route('dashboard.admin.products.review.list')" :active="request()->routeIs('dashboard.admin.products.review.list')" class="flex items-center justify-start w-full gap-2">
                    <i data-lucide="star"
                        class="transition-all stroke-1 w-4 h-4 {{ request()->routeIs('dashboard.admin.products.review.list') ? 'stroke-tertiary' : 'stroke-white/80 group-hover:stroke-tertiary' }} "></i>
                    <h1>Reviews</h1>
                </x-nav-link>
            </li>
            <li class="w-full">
                <x-nav-link :href="route('dashboard.admin.users')" :active="request()->routeIs('dashboard.admin.users')" class="flex items-center justify-start w-full gap-2">
                    <i data-lucide="users"
                        class="transition-all stroke-1 w-4 h-4 {{ request()->routeIs('dashboard.admin.users') ? 'stroke-tertiary' : 'stroke-white/80 group-hover:stroke-tertiary' }} "></i>
                    <h1>Users</h1>
                </x-nav-link>
            </li>
            <hr class="bg-white/20 border-1 border-white/20">
            <li class="w-full">
                <x-nav-link :href="route('dashboard.admin.profile')" :active="request()->routeIs('dashboard.admin.profile')" class="flex items-center justify-start w-full gap-2">
                    <i data-lucide="circle-user-round"
                        class="transition-all stroke-1 w-4 h-4 {{ request()->routeIs('dashboard.admin.profile') ? 'stroke-tertiary' : 'stroke-white/80 group-hover:stroke-tertiary' }} "></i>
                    <h1>Profile</h1>
                </x-nav-link>
            </li>
        </ul>
    </div>
    <form method="POST" action="{{ route('logout') }}" class="w-full">
        @csrf
        <x-primary-button
            class="w-full bg-[#e93b3c] text-white py-2.5 focus:bg-red-800 active:bg-red-800 flex items-center justify-center gap-2">
            <i data-lucide="log-out"
                class="w-4 h-4 transition-all stroke-2 stroke-white/80 group-hover:stroke-tertiary "></i>
            <h1>Logout</h1>
        </x-primary-button>
    </form>
</aside>
