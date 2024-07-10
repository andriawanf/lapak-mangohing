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
                                <select id="negara" name="negara"
                                    class="w-full text-sm border border-gray-300 rounded-md bg-gray-50 text-tertiary focus:ring-primary focus:border-primary">

                                    <option value="">Pilih jenis pembelian</option>
                                    <option value="mitra dagang">
                                        Mitra Dagang</option>
                                    <option value="bayar sekarang">
                                        Bayar Sekarang</option>
                                </select>
                                {{-- @error('negara')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror --}}
                            </div>

                            <hr />

                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <h2 class="col-span-2 text-sm font-semibold lg:text-md text-tertiary">Detail
                                    Pengiriman</h2>
                                <div class="col-span-2">
                                    <x-input-label for="nama_penerima" class="mb-2 text-xs text-tertiary/60">
                                        Nama penerima <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <x-text-input type="text" name="nama_penerima" id="nama_penerima"
                                        label="nama_penerima" class="w-full text-sm" value="{{ old('nama_penerima') }}"
                                        placeholder="Your Name" />
                                    {{-- @error('nama_penerima')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror --}}
                                </div>

                                <div>
                                    <x-input-label for="email" class="mb-2 text-xs text-tertiary/60">
                                        Email Penerima <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <x-text-input type="text" name="email" id="email" label="email"
                                        class="w-full text-sm" value="{{ old('email') }}"
                                        placeholder="example@gmail.com" />
                                    {{-- @error('email')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror --}}
                                </div>

                                <div>
                                    <x-input-label for="notelp" class="mb-2 text-xs text-tertiary/60">
                                        No. telpon <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <p class="text-sm font-medium text-tertiary/60">+62</p>
                                        </div>
                                        <x-text-input type="text" name="notelp" id="notelp" label="notelp"
                                            class="w-full text-sm pl-11" value="{{ old('notelp') }}"
                                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" />
                                    </div>
                                </div>

                                <div>
                                    <x-input-label for="negara" class="mb-2 text-xs text-tertiary/60">
                                        Negara <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <select id="negara" name="negara"
                                        class="w-full text-sm border border-gray-300 rounded-md bg-gray-50 text-tertiary focus:ring-primary focus:border-primary">

                                        <option value="">Pilih negara</option>
                                        <option value="indonesia">
                                            Indonesia</option>
                                        <option value="Malaysia">
                                            Malaysia</option>
                                        <option value="Singapura">
                                            Singapura</option>
                                    </select>
                                    {{-- @error('negara')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror --}}
                                </div>

                                <div>
                                    <x-input-label for="provinsi" class="mb-2 text-xs text-tertiary/60">
                                        Provinsi <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <select id="provinsi" name="provinsi"
                                        class="w-full text-sm border border-gray-300 rounded-md bg-gray-50 text-tertiary focus:ring-primary focus:border-primary">

                                        <option value="">Pilih provinsi</option>
                                        <option value="jabar">
                                            Jawa Barat</option>
                                        <option value="jatim">
                                            Jawa Timur</option>
                                        <option value="jateng">
                                            Jawa Tengah</option>
                                    </select>
                                    {{-- @error('provinsi')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror --}}
                                </div>

                                <div>
                                    <x-input-label for="kota" class="mb-2 text-xs text-tertiary/60">
                                        Kota <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <select id="kota" name="kota"
                                        class="w-full text-sm border border-gray-300 rounded-md bg-gray-50 text-tertiary focus:ring-primary focus:border-primary">

                                        <option value="">Pilih kota</option>
                                        <option value="bogor">
                                            Bogor</option>
                                        <option value="jakarta">
                                            Jakarta</option>
                                        <option value="bekasi">
                                            Bekasi</option>
                                    </select>
                                    {{-- @error('kota')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror --}}
                                </div>

                                <div>
                                    <x-input-label for="kecamatan" class="mb-2 text-xs text-tertiary/60">
                                        Kabupaten <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <select id="kecamatan" name="kecamatan"
                                        class="w-full text-sm border border-gray-300 rounded-md bg-gray-50 text-tertiary focus:ring-primary focus:border-primary">

                                        <option value="">Pilih kabupaten</option>
                                        <option value="bogor">
                                            Bogor</option>
                                        <option value="jakarta">
                                            Jakarta</option>
                                        <option value="bekasi">
                                            Bekasi</option>
                                    </select>
                                    {{-- @error('kecamatan')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror --}}
                                </div>

                                <div>
                                    <x-input-label for="kecamatan" class="mb-2 text-xs text-tertiary/60">
                                        Kecamatan <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <select id="kecamatan" name="kecamatan"
                                        class="w-full text-sm border border-gray-300 rounded-md bg-gray-50 text-tertiary focus:ring-primary focus:border-primary">

                                        <option value="">Pilih kecamatan</option>
                                        <option value="bogor">
                                            Bogor</option>
                                        <option value="jakarta">
                                            Jakarta</option>
                                        <option value="bekasi">
                                            Bekasi</option>
                                    </select>
                                    {{-- @error('kecamatan')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror --}}
                                </div>

                                <div>
                                    <x-input-label for="kode_pos" class="mb-2 text-xs text-tertiary/60">
                                        Kode pos <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <x-text-input type="text" name="kode_pos" id="kode_pos" label="kode_pos"
                                        class="w-full text-sm" value="{{ old('kode_pos') }}"
                                        placeholder="kode pos" />
                                    {{-- @error('kode_pos')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror --}}
                                </div>

                                <div class="col-span-2">
                                    <x-input-label for="alamat" class="mb-2 text-xs text-tertiary/60">
                                        Detail alamat <span class="text-red-500">*</span>
                                    </x-input-label>
                                    <textarea id="alamat" rows="6" name="alamat"
                                        class="block p-2.5 w-full text-sm text-tertiary bg-gray-white rounded-lg border border-gray-300 focus:ring-primary focus:border-primary font-poppins"
                                        placeholder="Masukan detail alamat anda">{{ old('alamat') }}</textarea>
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
                                                <input id="dhl" aria-describedby="dhl-text" type="radio"
                                                    name="delivery-method" value=""
                                                    class="w-4 h-4 bg-white border-gray-300 text-primary focus:ring-2 focus:ring-primary"
                                                    checked />
                                            </div>

                                            <div class="text-sm ms-4">
                                                <label for="dhl" class="font-medium leading-none text-tertiary">
                                                    Gratis pengiriman </label>
                                                <div>
                                                    <p id="dhl-text"
                                                        class="mt-1 text-xs font-normal text-tertiary/50">
                                                        Min. Pembelian: <span>Rp. 250.000</span></p>
                                                    <p id="dhl-text"
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
                                                <input id="fedex" aria-describedby="fedex-text" type="radio"
                                                    name="delivery-method" value=""
                                                    class="w-4 h-4 bg-white border-gray-300 text-primary focus:ring-2 focus:ring-primary" />
                                            </div>

                                            <div class="text-sm ms-4">
                                                <label for="fedex" class="font-medium leading-none text-tertiary">
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
                                                <input id="express" aria-describedby="express-text" type="radio"
                                                    name="delivery-method" value=""
                                                    class="w-4 h-4 bg-white border-gray-300 text-primary focus:ring-2 focus:ring-primary" />
                                            </div>

                                            <div class="text-sm ms-4">
                                                <label for="express" class="font-medium leading-none text-tertiary">
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
                        </div>
                    </div>

                    <div
                        class="w-full p-4 mt-6 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md sm:p-6">
                        <div class="space-y-4">
                            <h2 class="mb-4 text-sm font-semibold lg:text-md text-tertiary">Orderan Anda</h2>
                            <div class="space-y-4">
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="flex items-start w-full col-span-2 gap-3">
                                        <img src="{{ asset('/images/mang-ohing-logo.png') }}" alt=""
                                            class="object-cover rounded-lg size-16">
                                        <div>
                                            <p class="text-sm font-medium text-tertiary line-clamp-2">Lorem, ipsum
                                                dolor
                                                sit amet consectetur adipisicing elit.</p>
                                            <div class="flex flex-wrap mt-1 gap-x-2 gap-y-1">
                                                <p class="text-xs font-normal text-tertiary/50">Berat: 1 kg</p>
                                                <p class="text-xs font-normal text-tertiary/50">Panjang: 20 cm
                                                </p>
                                                <p class="text-xs font-normal text-tertiary/50">Lebar: 10 cm</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col items-end justify-start w-full col-span-1">
                                        <p class="mb-1 text-sm font-medium text-tertiary">26 pcs</p>
                                        <p class="text-sm font-bold text-tertiary">Rp. 1.820.000</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="flex items-start w-full col-span-2 gap-3">
                                        <img src="{{ asset('/images/mang-ohing-logo.png') }}" alt=""
                                            class="object-cover rounded-lg size-16">
                                        <div>
                                            <p class="text-sm font-medium text-tertiary line-clamp-2">Lorem, ipsum
                                                dolor
                                                sit amet consectetur adipisicing elit.</p>
                                            <div class="flex flex-wrap mt-1 gap-x-2 gap-y-1">
                                                <p class="text-xs font-normal text-tertiary/50">Berat: 1 kg</p>
                                                <p class="text-xs font-normal text-tertiary/50">Panjang: 20 cm
                                                </p>
                                                <p class="text-xs font-normal text-tertiary/50">Lebar: 10 cm</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col items-end justify-start w-full col-span-1">
                                        <p class="mb-1 text-sm font-medium text-tertiary">26 pcs</p>
                                        <p class="text-sm font-bold text-tertiary">Rp. 1.820.000</p>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="space-y-4">
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
                                class="flex w-full items-center justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-0  focus:ring-primary">Lanjut
                                ke Pembayaran</button>
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
