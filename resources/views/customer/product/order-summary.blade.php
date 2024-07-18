<x-guest-layout>
    <section
        class="relative z-0 w-full pt-12 pb-12 min-h-fit lg:min-h-fit lg:pb-16 lg:pt-16 isolate bg-background food-pattern">
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <form action="#" class="px-4 mx-auto ">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#"
                            class="inline-flex items-center text-sm font-normal text-tertiary/40 hover:text-primary">
                            Cart
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="#"
                                class="text-sm font-normal text-tertiary/40 ms-1 md:ms-2 hover:text-primary">Checkout</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="#" class="text-sm font-normal text-primary ms-1 md:ms-2 ">Detail Order</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="#"
                                class="text-sm font-normal text-tertiary/40 hover:text-primary ms-1 md:ms-2 ">Pembayaran</a>
                        </div>
                    </li>
                </ol>

                <div class="gap-4 mt-6 lg:flex lg:items-start">
                    <div class="flex-1 min-w-0 space-y-4">
                        <div class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6">
                            <h2 class="col-span-2 text-sm font-semibold lg:text-md text-tertiary">Rincian pengiriman
                            </h2>
                            <div class="space-y-4 ">
                                <dl>
                                    <dt class="text-sm font-medium text-tertiary">{{ $order->customer_name }}</dt>
                                    <dd class="mt-1 text-xs font-normal text-tertiary/50">{{ $order->customer_name }} |
                                        (+62) {{ $order->customer_phone }} | {{ $order->customer_address }}, <span
                                            class="uppercase">{{ $order->customer_district }}</span>, <span
                                            class="uppercase">{{ $order->customer_regency }}</span>, <span
                                            class="uppercase">{{ $order->customer_province }}</span>, <span
                                            class="uppercase">{{ $order->customer_country }}</span>, ID <span
                                            class="uppercase">{{ $order->customer_postcode }}</span></dd>
                                </dl>

                                <button type="button" data-modal-target="billingInformationModal"
                                    data-modal-toggle="billingInformationModal"
                                    class="text-sm font-medium text-primary hover:underline ">Edit</button>
                            </div>
                        </div>
                        <div class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6">
                            <h2 class="col-span-2 text-sm font-semibold lg:text-md text-tertiary">Rincian Produk
                            </h2>
                            @foreach ($order->items as $item)
                                <div class="space-y-3">
                                    <div class="flex items-center gap-6">
                                        <a href="#" class="w-24 h-24 shrink-0">
                                            <img class="object-cover w-full h-full size-16"
                                                src="{{ asset('/images/mang-ohing-logo.png') }}"
                                                alt="image-{{ $item->product_name }}" />
                                        </a>

                                        <div>
                                            <a href="#"
                                                class="flex-1 min-w-0 text-sm font-medium text-tertiary hover:underline">
                                                {{ $item->product_name }}
                                            </a>
                                            <div class="flex flex-wrap mt-1 gap-x-2 gap-y-1">
                                                <p class="text-sm font-normal text-tertiary/50">Berat:
                                                    {{ $item->product->product_weight }} kg</p>
                                                <p class="text-sm font-normal text-tertiary/50">Panjang:
                                                    {{ $item->product->product_height }} cm
                                                </p>
                                                <p class="text-sm font-normal text-tertiary/50">Lebar:
                                                    {{ $item->product->product_width }} cm</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between gap-4">
                                        <p class="text-sm font-normal text-gray-500 "><span
                                                class="font-medium text-tertiary ">Product ID:</span>
                                            {{ $item->product->product_number }}</p>

                                        <div class="flex flex-col items-end justify-end gap-2">
                                            <p class="text-sm font-normal text-tertiary ">x{{ $item->quantity }} pcs
                                            </p>

                                            <p class="text-lg font-bold leading-tight text-tertiary ">Rp.
                                                {{ number_format($item->base_total, 0, ',', '.') }},00</p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            @endforeach
                        </div>
                    </div>

                    <div
                        class="w-full p-4 mt-6 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md sm:p-6">
                        <div class="space-y-4">
                            <h2 class="mb-4 text-sm font-semibold lg:text-md text-tertiary">Rincian Pembayaran
                            </h2>
                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Tanggal
                                            order:
                                        </dt>
                                        <dd class="text-sm font-medium text-tertiary subtotal-product">
                                            {{ $order->created_at->isoFormat('dddd, D MMM YYYY') }}
                                        </dd>
                                    </dl>
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Jenis
                                            pembelian:
                                        </dt>
                                        <dd class="text-sm font-medium text-tertiary subtotal-product">
                                            @if ($order->purchase_option == 'mitra_dagang')
                                                Mitra Dagang
                                            @else
                                                Bayar Sekarang
                                            @endif
                                        </dd>
                                    </dl>
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Jenis
                                            Pengiriman:
                                        </dt>
                                        <dd class="text-sm font-medium text-tertiary subtotal-product capitalize">
                                            {{ $order->shipping_method }}
                                        </dd>
                                    </dl>
                                    {{-- <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Metode
                                            pembayaran:
                                        </dt>
                                        <dd class="text-sm font-medium text-tertiary subtotal-product">Credit Card
                                        </dd>
                                    </dl> --}}
                                </div>
                                <hr />
                                <div class="space-y-2">
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Subtotal:
                                        </dt>
                                        <dd class="text-sm font-medium text-tertiary subtotal-product">Rp.
                                            {{ number_format($order->base_total_price, 0, ',', '.') }},00
                                        </dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Diskon:
                                        </dt>
                                        <dd class="text-sm font-medium text-tertiary">
                                            {{ number_format($order->discount_percent, 0, ',', '.') }}%</dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Hemat:
                                        </dt>
                                        <dd class="text-sm font-medium text-primary">- Rp.
                                            {{ number_format($order->discount_amount, 0, ',', '.') }},00</dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Biaya
                                            Pengiriman:
                                        </dt>
                                        <dd class="text-sm font-medium text-tertiary subtotal-product">Rp.
                                            {{ number_format($order->shipping_cost, 0, ',', '.') }},00</dd>
                                    </dl>
                                </div>

                                <dl class="flex items-center justify-between gap-4 pt-2 border-t border-gray-200">
                                    <dt class="text-sm font-bold text-tertiary">Total:</dt>
                                    <dd class="text-sm font-bold text-tertiary total-price">Rp.
                                        {{ number_format($order->grand_total, 0, ',', '.') }},00</dd>
                                </dl>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <button type="submit"
                                class="flex w-full items-center justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-0  focus:ring-primary">Bayar
                                Sekarang</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    {{-- footer --}}
    <livewire:customer.components.footer />
</x-guest-layout>
