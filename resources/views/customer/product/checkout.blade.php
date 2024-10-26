<x-guest-layout>
    <section
        class="relative z-0 w-full pt-12 pb-12 min-h-fit lg:min-h-fit lg:pb-16 lg:pt-16 isolate bg-background food-pattern">
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('checkout.process') }}" method="POST" class="px-4 mx-auto ">
                @csrf
                <input type="hidden" name="product_ids" value="{{ json_encode($cartItems->pluck('product_id')) }}">
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
                            <a href="#" class="text-sm font-normal text-primary ms-1 md:ms-2">Checkout</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="text-sm font-normal text-tertiary/40 ms-1 md:ms-2">Detail Order</span>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="text-sm font-normal text-tertiary/40 ms-1 md:ms-2">Pembayaran</span>
                        </div>
                    </li>
                </ol>

                <div class="gap-4 mt-6 lg:flex lg:items-start">
                    <div class="flex-1 min-w-0 space-y-6">
                        <div class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6">
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

                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <h2 class="col-span-2 text-sm font-semibold lg:text-md text-tertiary">Detail
                                    Pengiriman</h2>
                                <div class="col-span-2">
                                    <x-input-label for="customer_name" class="mb-2 text-xs text-tertiary/60">
                                        Nama penerima <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <x-text-input type="text" name="customer_name" id="customer_name"
                                        label="customer_name" class="w-full text-sm" value="{{ old('customer_name') }}"
                                        placeholder="Your Name" />
                                    @error('customer_name')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-2 md:col-span-1">
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

                                <div class="col-span-2 md:col-span-1">
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

                                <div class="col-span-2 md:col-span-1">
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

                                <div class="col-span-2 md:col-span-1">
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

                                <div class="col-span-2 md:col-span-1">
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

                                <div class="col-span-2 md:col-span-1">
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

                                <div class="col-span-2 md:col-span-1">
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

                                <div class="col-span-2 md:col-span-1">
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
                                    <div class="grid items-start grid-cols-1 gap-4">
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
                                        <div class="flex justify-start w-full">
                                            <p class="text-sm font-bold text-tertiary">Rp. 0</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-4 border border-gray-200 rounded-lg bg-gray-50 ps-4 ">
                                    <div class="grid items-start grid-cols-1 gap-4">
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
                                        <div class="flex justify-start w-full ">
                                            <p class="text-sm font-bold text-tertiary">Rp. 20.000 - Rp. 30.000</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-4 border border-gray-200 rounded-lg bg-gray-50 ps-4 ">
                                    <div class="grid items-start grid-cols-1 gap-4">
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

                                        <div class="flex justify-start w-full">
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

                    <div
                        class="w-full p-4 mt-6 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md sm:p-6">
                        <div class="space-y-4">
                            <h2 class="mb-4 text-sm font-semibold lg:text-md text-tertiary">Rincian Produk & Pembayaran
                            </h2>
                            <div class="space-y-4">
                                @foreach ($cartItems as $item)
                                    <div class="grid grid-cols-1 gap-2 md:grid-cols-3">
                                        <div class="flex items-start w-full col-span-2 gap-3">
                                            @php
                                                // Decode JSON untuk mendapatkan array path
                                                $imageData = json_decode($item->product->product_image, true);

                                                // Ambil path pertama dari array, jika ada, dan ambil nama file menggunakan basename
                                                $filePath = $imageData ? reset($imageData) : null;
                                                $fileName = $filePath ? basename($filePath) : null;

                                                // Gabungkan path direktori dengan nama file atau gunakan gambar default jika file tidak ada
                                                $imageUrl = $fileName
                                                    ? asset('storage/images/products/' . $fileName)
                                                    : asset('/storage/images/products/default-product.png');
                                            @endphp
                                            <img src="{{ $imageUrl }}" alt=""
                                                class="object-cover rounded-lg size-16">
                                            <div>
                                                <p class="text-sm font-medium text-tertiary line-clamp-2">
                                                    {{ $item->product->product_name }}</p>
                                                <div class="flex flex-wrap mt-1 gap-x-2 gap-y-1">
                                                    <p class="text-xs font-normal text-tertiary/50">Berat:
                                                        {{ $item->product->product_weight }} kg</p>
                                                    <p class="text-xs font-normal text-tertiary/50">Panjang:
                                                        {{ $item->product->product_length }} cm
                                                    </p>
                                                    <p class="text-xs font-normal text-tertiary/50">Lebar:
                                                        {{ $item->product->product_width }} cm</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-col items-end justify-start w-full col-span-1">
                                            <p class="mb-1 text-sm font-medium text-tertiary">{{ $item->quantity }}
                                                pcs</p>
                                            @php
                                                $subtotal = $item->quantity * $item->price;
                                            @endphp
                                            <p class="text-sm font-bold text-tertiary">Rp.
                                                {{ number_format($subtotal, 0, ',', '.') }},00</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <hr />
                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Subtotal
                                        </dt>
                                        <dd class="text-sm font-medium text-tertiary subtotal-product">Rp.
                                            {{ number_format($baseTotalPrice, 0, ',', '.') }},00
                                        </dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Diskon
                                        </dt>
                                        <dd class="text-sm font-medium text-tertiary">
                                            {{ number_format($totalDiscount, 0, ',', '.') }}%</dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Hemat</dt>
                                        <dd class="text-sm font-medium text-primary">- Rp.
                                            {{ number_format($discountAmount, 0, ',', '.') }},00</dd>
                                    </dl>
                                </div>

                                <dl class="flex items-center justify-between gap-4 pt-2 border-t border-gray-200">
                                    <dt class="text-sm font-bold text-tertiary">Total</dt>
                                    <dd class="text-sm font-bold text-tertiary total-price">Rp.
                                        {{ number_format($grandTotal, 0, ',', '.') }},00
                                    </dd>
                                </dl>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <button type="submit"
                                class="flex w-full items-center justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-0  focus:ring-primary">Buat
                                Pesanan</button>
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
</x-guest-layout>
