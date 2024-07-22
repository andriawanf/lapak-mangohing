<x-guest-layout>
    <section
        class="relative z-0 w-full pt-12 pb-12 min-h-fit lg:min-h-fit lg:pb-16 lg:pt-16 isolate bg-background food-pattern">
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="px-4 mx-auto ">
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

                                <button type="button" data-modal-target="editAddressModal"
                                    data-modal-toggle="editAddressModal"
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
                                        <dd class="text-sm font-medium capitalize text-tertiary subtotal-product">
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
                            @if (session()->has('whatsappMessage'))
                                <button data-modal-target="sendWhatsAppButton" data-modal-toggle="sendWhatsAppButton"
                                    class="flex w-full items-center justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-0  focus:ring-primary">Kirim
                                    Pesanan via Whatsapp</button>
                            @else
                                <button type="submit"
                                    class="flex w-full items-center justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-0  focus:ring-primary">Bayar
                                    Sekarang</button>
                            @endif
                            <p class="text-sm font-normal text-center text-tertiary/50 hover:text-tertiary"> or </p>
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('product.collections') }}" title=""
                                    class="inline-flex items-center gap-2 text-sm font-normal text-tertiary/50 hover:underline">
                                    Batalkan pesanan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- modal send whatsapp --}}
    <div id="sendWhatsAppButton" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-lg max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-medium text-gray-900 ">
                        Kirim Pesan Whatsapp
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="sendWhatsAppButton">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    {{-- <textarea id="whatsappMessage" class="w-full h-48 border-gray-300 rounded-md p-2" readonly>{{ session('whatsappMessage') }}</textarea> --}}
                    <textarea id="whatsappMessage" rows="6" name="whatsappMessage"
                        class="block p-2.5 w-full text-sm text-tertiary bg-gray-white rounded-lg border border-gray-300 focus:ring-primary focus:border-primary font-poppins"
                        disabled>{{ session('whatsappMessage') }}</textarea>
                    <form id="sendWhatsAppForm" action="{{ route('send.whatsapp') }}" method="POST"
                        class="mt-4">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <input type="hidden" name="message" value="{{ session('whatsappMessage') }}">
                        <x-input-label for="whatsappNumber" class="mb-2 text-xs text-tertiary/60">
                            Nomor WhatsApp Anda: <span class="text-red-500">*</span>
                        </x-input-label>
                        <x-text-input type="text" name="whatsapp_number" id="whatsappNumber"
                            label="whatsapp_number" class="w-full text-sm" value="{{ old('whatsapp_number') }}"
                            required pattern="^\+\d{10,15}$" placeholder="+6281234567890" />
                        @error('whatsapp_number')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b ">
                            <button type="submit"
                                class="text-white bg-primary hover:bg-red-800 focus:ring-0 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Kirim
                                Pesan</button>
                            <button data-modal-hide="sendWhatsAppButton" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="editAddressModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full p-4">
            <!-- Modal content -->
            <div class="relative z-50 bg-white rounded-lg shadow 0">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Edit Alamat Pengiriman
                    </h3>
                    <button type="button"
                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto"
                        data-modal-toggle="editAddressModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 space-y-6 md:p-5">
                    <div class="flex-1 min-w-0 space-y-6">
                        <div class="space-y-4">
                            <div>
                                <h2 class="mb-4 text-sm font-semibold lg:text-md text-tertiary">Jenis Pembelian</h2>
                                <select id="purchase_option" name="purchase_option"
                                    class="w-full text-sm border border-gray-300 rounded-md bg-gray-50 text-tertiary focus:ring-primary focus:border-primary">

                                    <option value="">Pilih jenis pembelian</option>
                                    <option value="mitra_dagang">
                                        Mitra Dagang</option>
                                    <option value="bayar_sekarang">
                                        Bayar Sekarang</option>
                                </select>
                                @error('purchase_option')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <hr />

                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <h2 class="col-span-2 text-sm font-semibold lg:text-md text-tertiary">Detail
                                    Pengiriman</h2>
                                <div class="col-span-2">
                                    <x-input-label for="customer_name" class="mb-2 text-xs text-tertiary/60">
                                        Nama penerima <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <x-text-input type="text" name="customer_name" id="customer_name"
                                        label="customer_name" class="w-full text-sm"
                                        value="{{ old('customer_name') }}" placeholder="Your Name" />
                                    @error('customer_name')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <x-input-label for="customer_email" class="mb-2 text-xs text-tertiary/60">
                                        Email Penerima <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <x-text-input type="text" name="customer_email" id="customer_email"
                                        label="customer_email" class="w-full text-sm"
                                        value="{{ old('customer_email') }}" placeholder="example@gmail.com" />
                                    @error('customer_email')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <x-input-label for="customer_phone" class="mb-2 text-xs text-tertiary/60">
                                        No. telpon <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <p class="text-sm font-medium text-tertiary/60">+62</p>
                                        </div>
                                        <x-text-input type="text" name="customer_phone" id="customer_phone"
                                            label="customer_phone" class="w-full text-sm pl-11"
                                            value="{{ old('customer_phone') }}" placeholder="123-456-7890" />
                                        @error('customer_phone')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <x-input-label for="customer_country" class="mb-2 text-xs text-tertiary/60">
                                        Negara <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <select id="customer_country" name="customer_country"
                                        class="w-full text-sm border border-gray-300 rounded-md bg-gray-50 text-tertiary focus:ring-primary focus:border-primary">

                                        <option value="">Pilih negara</option>
                                        <option value="indonesia">
                                            Indonesia</option>
                                        <option value="Malaysia">
                                            Malaysia</option>
                                        <option value="Singapura">
                                            Singapura</option>
                                    </select>
                                    @error('customer_country')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <x-input-label for="customer_province" class="mb-2 text-xs text-tertiary/60">
                                        Provinsi <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <select id="customer_province" name="customer_province"
                                        class="w-full text-sm border border-gray-300 rounded-md bg-gray-50 text-tertiary focus:ring-primary focus:border-primary">

                                        <option value="">Pilih provinsi</option>
                                        <option value="jabar">
                                            Jawa Barat</option>
                                        <option value="jatim">
                                            Jawa Timur</option>
                                        <option value="jateng">
                                            Jawa Tengah</option>
                                    </select>
                                    @error('customer_province')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <x-input-label for="customer_city" class="mb-2 text-xs text-tertiary/60">
                                        Kota <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <select id="customer_city" name="customer_city"
                                        class="w-full text-sm border border-gray-300 rounded-md bg-gray-50 text-tertiary focus:ring-primary focus:border-primary">

                                        <option value="">Pilih kota</option>
                                        <option value="bogor">
                                            Bogor</option>
                                        <option value="jakarta">
                                            Jakarta</option>
                                        <option value="bekasi">
                                            Bekasi</option>
                                    </select>
                                    @error('customer_city')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <x-input-label for="customer_regency" class="mb-2 text-xs text-tertiary/60">
                                        Kabupaten <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <select id="customer_regency" name="customer_regency"
                                        class="w-full text-sm border border-gray-300 rounded-md bg-gray-50 text-tertiary focus:ring-primary focus:border-primary">

                                        <option value="">Pilih kabupaten</option>
                                        <option value="bogor">
                                            Bogor</option>
                                        <option value="jakarta">
                                            Jakarta</option>
                                        <option value="bekasi">
                                            Bekasi</option>
                                    </select>
                                    @error('customer_regency')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <x-input-label for="customer_district" class="mb-2 text-xs text-tertiary/60">
                                        Kecamatan <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <select id="customer_district" name="customer_district"
                                        class="w-full text-sm border border-gray-300 rounded-md bg-gray-50 text-tertiary focus:ring-primary focus:border-primary">

                                        <option value="">Pilih kecamatan</option>
                                        <option value="bogor">
                                            Bogor</option>
                                        <option value="jakarta">
                                            Jakarta</option>
                                        <option value="bekasi">
                                            Bekasi</option>
                                    </select>
                                    @error('customer_district')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <x-input-label for="customer_postcode" class="mb-2 text-xs text-tertiary/60">
                                        Kode pos <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <x-text-input type="text" name="customer_postcode" id="customer_postcode"
                                        label="customer_postcode" class="w-full text-sm"
                                        value="{{ old('customer_postcode') }}" placeholder="kode pos" />
                                    @error('customer_postcode')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-2">
                                    <x-input-label for="customer_address" class="mb-2 text-xs text-tertiary/60">
                                        Detail alamat <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <textarea id="customer_address" rows="6" name="customer_address"
                                        class="block p-2.5 w-full text-sm text-tertiary bg-gray-white rounded-lg border border-gray-300 focus:ring-primary focus:border-primary font-poppins"
                                        placeholder="Masukan detail alamat anda">{{ old('customer_address') }}</textarea>
                                    @error('customer_address')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-2">
                                    <x-input-label for="customer_note" class="mb-2 text-xs text-tertiary/60">
                                        Catatan (optional)
                                    </x-input-label>
                                    <textarea id="customer_note" rows="3" name="customer_note"
                                        class="block p-2.5 w-full text-sm text-tertiary bg-gray-white rounded-lg border border-gray-300 focus:ring-primary focus:border-primary font-poppins"
                                        placeholder="masukan catatan anda disini">{{ old('customer_note') }}</textarea>
                                    @error('customer_note')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6">
                            <h2 class="col-span-2 text-sm font-semibold lg:text-md text-tertiary">Jenis Pengiriman</h2>

                            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                                <div class="p-4 border border-gray-200 rounded-lg bg-gray-50 ps-4 ">
                                    <div class="grid items-start grid-cols-2 gap-4 lg:grid-cols-1">
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="pengiriman_gratis"
                                                    aria-describedby="pengiriman_gratis-text" type="radio"
                                                    name="shipping_method" value="pengiriman_gratis"
                                                    class="w-4 h-4 bg-white border-gray-300 text-primary focus:ring-2 focus:ring-primary"
                                                    checked />
                                            </div>

                                            <div class="text-sm ms-4">
                                                <label for="free_shipping"
                                                    class="font-medium leading-none text-tertiary">
                                                    Gratis pengiriman </label>
                                                <div>
                                                    <p id="free_shipping-text"
                                                        class="mt-1 text-xs font-normal text-tertiary/50">
                                                        Min. Pembelian: <span>Rp. 250.000</span></p>
                                                    <p id="free_shipping-text"
                                                        class="mt-1 text-xs font-normal text-tertiary/50">
                                                        Estimasi waktu: <span>7-30 hari kerja</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-end w-full lg:justify-center">
                                            <p class="text-sm font-bold text-tertiary">Rp. 0</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-4 border border-gray-200 rounded-lg bg-gray-50 ps-4 ">
                                    <div class="grid items-start grid-cols-2 gap-4 lg:grid-cols-1">
                                        <div class="flex items-start w-full">
                                            <div class="flex items-center h-5">
                                                <input id="pengiriman_reguler"
                                                    aria-describedby="pengiriman_reguler-text" type="radio"
                                                    name="shipping_method" value="pengiriman_reguler"
                                                    class="w-4 h-4 bg-white border-gray-300 text-primary focus:ring-2 focus:ring-primary" />
                                            </div>

                                            <div class="text-sm ms-4">
                                                <label for="pengiriman_reguler"
                                                    class="font-medium leading-none text-tertiary">
                                                    Pengiriman reguler </label>
                                                <div>
                                                    <p id="dhl-text"
                                                        class="mt-1 text-xs font-normal text-tertiary/50">
                                                        Biaya: <span>Bervariasi tergantung pada lokasi tujuan.</span>
                                                    </p>
                                                    <p id="dhl-text"
                                                        class="mt-1 text-xs font-normal text-tertiary/50">
                                                        Estimasi waktu: <span>3-14 hari kerja</span></p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-end w-full lg:justify-center">
                                            <p class="text-sm font-bold text-tertiary">Rp. 20.000 - Rp. 30.000</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-4 border border-gray-200 rounded-lg bg-gray-50 ps-4 ">
                                    <div class="grid items-start grid-cols-2 gap-4 lg:grid-cols-1">
                                        <div class="flex items-start w-full">
                                            <div class="flex items-center h-5">
                                                <input id="pengiriman_cepat" aria-describedby="pengiriman_cepat-text"
                                                    type="radio" name="shipping_method" value="pengiriman_cepat"
                                                    class="w-4 h-4 bg-white border-gray-300 text-primary focus:ring-2 focus:ring-primary" />
                                            </div>

                                            <div class="text-sm ms-4">
                                                <label for="pengiriman_cepat"
                                                    class="font-medium leading-none text-tertiary">
                                                    Pengiriman Cepat</label>
                                                <div>
                                                    <p id="dhl-text"
                                                        class="mt-1 text-xs font-normal text-tertiary/50">
                                                        Prioritas: <span>untuk yang membutuhkan barang
                                                            dengan segera.</span></p>
                                                    <p id="dhl-text"
                                                        class="mt-1 text-xs font-normal text-tertiary/50">
                                                        Estimasi waktu: <span>7-3 hari kerja</span></p>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex justify-end w-full lg:justify-center">
                                            <p class="text-sm font-bold text-tertiary">Rp. 40.000 - Rp. 60.000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('shipping_method')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add new product
                    </button>
                </form>
            </div>
        </div>
    </div>
    {{-- footer --}}
    <livewire:customer.components.footer />
</x-guest-layout>
