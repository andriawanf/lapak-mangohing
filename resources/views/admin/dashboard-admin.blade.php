<x-app-layout>
    <div class="relative flex flex-row">
        {{-- sidebar --}}
        <livewire:layout.sidebar />
        <div class="relative w-full bg-gradient-to-r from-white to-primary/10">
            <livewire:layout.navbar />
            <section class="w-full ">
                <div class="px-3 py-6">
                    <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">
                        <!-- Stats Chart -->
                        <livewire:statistics.sales-stats />
                        <!--Stats this month products & customers -->
                        <livewire:statistics.top-products-customers-stats />
                    </div>
                    <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
                        {{-- New Product chart info --}}
                        <livewire:statistics.new-products-stats />
                        {{-- user chart info --}}
                        <livewire:statistics.users-stats />
                        {{-- audiences by age info --}}
                        <livewire:statistics.audiences-stats />
                    </div>
                    <!-- 2 columns -->
                    <div class="grid grid-cols-1 my-4 xl:grid-cols-2 xl:gap-4">
                        <!-- Activity Card -->
                        <livewire:statistics.activities-stats />
                        <!--Todo lists -->
                        <livewire:partials.todolist />
                    </div>
                    {{-- transaction history --}}
                    <livewire:tables.transactions-history-table />
                </div>
            </section>
            <livewire:layout.footer />
        </div>
    </div>
</x-app-layout>
