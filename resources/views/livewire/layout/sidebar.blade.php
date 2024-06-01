<aside class="flex flex-col items-start justify-between w-full shadow-sm sidebar-container bg-primary" id="sidebar">
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
            <x-nav-link :href="route('dashboard.admin.orders')" :active="request()->routeIs('dashboard.admin.orders')" class="flex items-center justify-start gap-2">
                <i data-lucide="scroll-text"
                    class="transition-all stroke-1 {{ request()->routeIs('dashboard.admin.orders') ? 'stroke-tertiary' : 'stroke-white/80 group-hover:stroke-tertiary' }} "></i>
                {{-- <img src="/icons/shopping-basket.svg" width="24" height="24" alt=""> --}}
                <h1>Orders</h1>
            </x-nav-link>
            <x-nav-link :href="route('dashboard.admin.products')" :active="request()->routeIs('dashboard.admin.products')" class="flex items-center justify-start gap-2">
                <i data-lucide="shopping-cart"
                    class="transition-all stroke-1 {{ request()->routeIs('dashboard.admin.products') ? 'stroke-tertiary' : 'stroke-white/80 group-hover:stroke-tertiary' }} "></i>
                <h1>Products</h1>
            </x-nav-link>
            <x-nav-link :href="route('dashboard.admin.categories')" :active="request()->routeIs('dashboard.admin.categories')" class="flex items-center justify-start gap-2">
                <i data-lucide="layout-list"
                    class="transition-all stroke-1 {{ request()->routeIs('dashboard.admin.categories') ? 'stroke-tertiary' : 'stroke-white/80 group-hover:stroke-tertiary' }} "></i>
                <h1>Categories</h1>
            </x-nav-link>
            <x-nav-link :href="route('dashboard.admin.reviews')" :active="request()->routeIs('dashboard.admin.reviews')" class="flex items-center justify-start gap-2">
                <i data-lucide="star"
                    class="transition-all stroke-1 {{ request()->routeIs('dashboard.admin.reviews') ? 'stroke-tertiary' : 'stroke-white/80 group-hover:stroke-tertiary' }} "></i>
                <h1>Reviews</h1>
            </x-nav-link>
            <x-nav-link :href="route('dashboard.admin.users')" :active="request()->routeIs('dashboard.admin.users')" class="flex items-center justify-start gap-2">
                <i data-lucide="users"
                    class="transition-all stroke-1 {{ request()->routeIs('dashboard.admin.users') ? 'stroke-tertiary' : 'stroke-white/80 group-hover:stroke-tertiary' }} "></i>
                <h1>Users</h1>
            </x-nav-link>
            <hr class="bg-white/20 border-1 border-white/20">
            <x-nav-link :href="route('dashboard.admin.profile')" :active="request()->routeIs('dashboard.admin.profile')" class="flex items-center justify-start gap-2">
                <i data-lucide="circle-user-round"
                    class="transition-all stroke-1 {{ request()->routeIs('dashboard.admin.profile') ? 'stroke-tertiary' : 'stroke-white/80 group-hover:stroke-tertiary' }} "></i>
                <h1>Profile</h1>
            </x-nav-link>
        </div>
    </div>
    <form method="POST" action="{{ route('logout') }}" class="w-full">
        @csrf
        <x-primary-button
            class="w-full bg-[#e93b3c] text-white py-2.5 focus:bg-[#a52a2b] active:bg-[#a52a2b] flex items-center justify-center gap-2">
            <i data-lucide="log-out" class="transition-all stroke-2 stroke-white/80 group-hover:stroke-tertiary "></i>
            <h1>Logout</h1>
        </x-primary-button>
    </form>
</aside>
