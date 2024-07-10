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
                            <h2 class="col-span-2 text-sm font-semibold lg:text-md text-tertiary">Informasi pembayaran &
                                pengiriman
                            </h2>
                            <div class="space-y-6">
                                <div class="grid grid-cols-2">
                                    <div class="space-y-4">
                                        <div>
                                            <p class="text-xs font-normal text-tertiary/60 mb-2">Penerima</p>
                                            <p class="text-sm font-medium text-tertiary">Jhon Doe</p>
                                        </div>
                                        <div>
                                            <p class="text-xs font-normal text-tertiary/60 mb-2">Email</p>
                                            <p class="text-sm font-medium text-tertiary">jhondoe@gmail.com</p>
                                        </div>
                                        <div>
                                            <p class="text-xs font-normal text-tertiary/60 mb-2">Negara</p>
                                            <p class="text-sm font-medium text-tertiary">Indonesia</p>
                                        </div>
                                        <div>
                                            <p class="text-xs font-normal text-tertiary/60 mb-2">Kota</p>
                                            <p class="text-sm font-medium text-tertiary">Bogor</p>
                                        </div>
                                        <div>
                                            <p class="text-xs font-normal text-tertiary/60 mb-2">Kode pos</p>
                                            <p class="text-sm font-medium text-tertiary">46271</p>
                                        </div>
                                    </div>

                                    <div class="space-y-4">
                                        <div>
                                            <p class="text-xs font-normal text-tertiary/60 mb-2">Pengirim</p>
                                            <p class="text-sm font-medium text-tertiary">Mang Ohing</p>
                                        </div>
                                        <div>
                                            <p class="text-xs font-normal text-tertiary/60 mb-2">No. telpon</p>
                                            <p class="text-sm font-medium text-tertiary">+62 123 456 789</p>
                                        </div>
                                        <div>
                                            <p class="text-xs font-normal text-tertiary/60 mb-2">Provinsi</p>
                                            <p class="text-sm font-medium text-tertiary">Jawa Barat</p>
                                        </div>
                                        <div>
                                            <p class="text-xs font-normal text-tertiary/60 mb-2">Kabupaten</p>
                                            <p class="text-sm font-medium text-tertiary">Cibinong</p>
                                        </div>
                                        <div>
                                            <p class="text-xs font-normal text-tertiary/60 mb-2">Kecamatan</p>
                                            <p class="text-sm font-medium text-tertiary">Cibinong</p>
                                        </div>
                                    </div>

                                    <div class="col-span-2 mt-4">
                                        <p class="text-xs font-normal text-tertiary/60 mb-2">Alamat</p>
                                        <p class="text-sm font-medium text-tertiary">Lorem ipsum dolor sit amet
                                            consectetur adipisicing elit. Doloribus tempore mollitia nisi dolorem,
                                            tenetur quam?</p>
                                    </div>
                                </div>

                                {{-- button edit --}}
                                <button class="text-sm font-semibold text-primary hover:underline">Edit</button>
                            </div>
                        </div>
                        <div class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6">
                            <h2 class="col-span-2 text-sm font-semibold lg:text-md text-tertiary">Produk yang anda pesan
                            </h2>
                            <div class="space-y-2 p-6">
                                <div class="flex items-center gap-6">
                                    <a href="#" class="w-24 h-24 shrink-0">
                                        <img class="h-full w-full object-cover size-16"
                                            src="{{ asset('/images/mang-ohing-logo.png') }}" alt="imac image" />
                                    </a>

                                    <div>
                                        <a href="#"
                                            class="min-w-0 flex-1 font-medium text-tertiary hover:underline text-sm">
                                            PC system All in One APPLE iMac (2023) mqrq3ro/a, Apple M3, 24" Retina 4.5K,
                                            8GB, SSD 256GB, 10-core GPU, macOS Sonoma, Blue, Keyboard layout INT </a>
                                        <div class="flex flex-wrap mt-1 gap-x-2 gap-y-1">
                                            <p class="text-sm font-normal text-tertiary/50">Berat: 1 kg</p>
                                            <p class="text-sm font-normal text-tertiary/50">Panjang: 20 cm
                                            </p>
                                            <p class="text-sm font-normal text-tertiary/50">Lebar: 10 cm</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between gap-4">
                                    <p class="text-sm font-normal text-gray-500 "><span
                                            class="font-medium text-tertiary ">Product ID:</span>
                                        BJ8364850</p>

                                    <div class="flex flex-col items-end justify-end gap-2">
                                        <p class="text-sm font-normal text-tertiary ">x26 pcs</p>

                                        <p class="text-lg font-bold leading-tight text-tertiary ">Rp. 1.820.000
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr />
                        </div>
                    </div>

                    <div
                        class="w-full p-4 mt-6 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md sm:p-6">
                        <div class="space-y-4">
                            <h2 class="mb-4 text-sm font-semibold lg:text-md text-tertiary">Detail order</h2>
                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Order date
                                        </dt>
                                        <dd class="text-sm font-medium text-tertiary subtotal-product">10 Juli 2024
                                        </dd>
                                    </dl>
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Jenis
                                            pembelian
                                        </dt>
                                        <dd class="text-sm font-medium text-tertiary subtotal-product">Mitra Dagang
                                        </dd>
                                    </dl>
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Jenis
                                            Pengiriman
                                        </dt>
                                        <dd class="text-sm font-medium text-tertiary subtotal-product">Reguler
                                        </dd>
                                    </dl>
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Metode
                                            pembayaran
                                        </dt>
                                        <dd class="text-sm font-medium text-tertiary subtotal-product">Credit Card
                                        </dd>
                                    </dl>
                                </div>
                                <hr />
                                <div class="space-y-2">
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Subtotal
                                        </dt>
                                        <dd class="text-sm font-medium text-tertiary subtotal-product">Rp. 3.640.000
                                        </dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Diskon
                                        </dt>
                                        <dd class="text-sm font-medium text-green-600">- Rp. 0.00</dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Biaya
                                            Pengiriman
                                        </dt>
                                        <dd class="text-sm font-medium text-tertiary subtotal-product">Rp. 60.000</dd>
                                    </dl>
                                </div>

                                <dl class="flex items-center justify-between gap-4 pt-2 border-t border-gray-200">
                                    <dt class="text-sm font-bold text-tertiary">Total</dt>
                                    <dd class="text-sm font-bold text-tertiary total-price">Rp. 3.700.000</dd>
                                </dl>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <button type="submit"
                                class="flex w-full items-center justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-0  focus:ring-primary">Bayar
                                Sekarang</button>
                        </div>
                        <div class="flex items-center justify-center gap-2">
                            <span class="text-sm font-normal text-tertiary/50 hover:text-tertiary"> or </span>
                            <a href="{{ route('product.collections') }}" title=""
                                class="inline-flex items-center gap-2 text-sm font-medium underline text-primary hover:no-underline">
                                Lanjut Belanja
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    {{-- footer --}}
    <livewire:customer.components.footer />
</x-guest-layout>
