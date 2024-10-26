<x-guest-layout>
    <section class="relative">
        <div class="w-full pt-12 pb-12 min-h-fit lg:min-h-fit lg:pb-16 lg:pt-16 bg-background food-pattern">
            @if (session()->has('error'))
                <div id="toast-error"
                    class="absolute z-50 flex items-center justify-center p-4 text-gray-500 bg-white rounded-lg shadow right-20 -top-2 w-fit"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-white bg-red-100 rounded-lg">
                        <div class="rounded-full bg-primary">
                            <i data-lucide="circle-x" class="w-5 h-5"></i>
                        </div>
                    </div>
                    <div class="text-sm font-normal ms-3 text-nowrap text-primary">{{ session('error') }}</div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-tertiary rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 "
                        data-dismiss-target="#toast-error" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @elseif (session()->has('success'))
                <div id="toast-success"
                    class="absolute z-50 flex items-center justify-center p-4 mb-4 text-gray-500 bg-white rounded-lg shadow right-6 md:right-20 -top-2 w-fit"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="text-sm font-normal ms-3 text-nowrap">{{ session('success') }}</div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-tertiary rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 "
                        data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
            {{-- header --}}
            <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col p-4 bg-white shadow rounded-2xl sm:p-6">
                    <div class="flex flex-col items-start gap-3 md:gap-0 md:flex-row md:justify-between">
                        <h1 class="text-base font-bold md:text-xl">Mang Ohing - Produk Unggulan </h1>
                        <h1 class="text-base font-medium md:text-xl text-tertiary/60">({{ $productCount }} Produk)
                        </h1>
                    </div>
                    <hr class="mt-4" />
                    <div class="flex flex-col items-start justify-between gap-3 mt-4 md:gap-0 md:flex-row">
                        <div class="flex items-center gap-4">
                            {{-- filter sort --}}
                            <div>
                                <button id="dropdownFilterSort" data-dropdown-toggle="filterSort"
                                    class="inline-flex items-center px-5 py-2 text-sm font-medium text-center rounded-lg bg-gray-50 text-tertiary hover:bg-gray-200 focus:ring-0 focus:outline-none "
                                    type="button">
                                    <i data-lucide="arrow-up-z-a" class="w-4 h-4 stroke-2 me-2"></i>
                                    <p>Sort</p>
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <!-- Dropdown filter sort -->
                                <div id="filterSort"
                                    class="z-10 hidden w-48 bg-white border border-gray-200 divide-y divide-gray-100 rounded-lg shadow-lg">
                                    <ul class="p-3 space-y-3 text-sm text-gray-700 "
                                        aria-labelledby="dropdownFilterSort">
                                        <li>
                                            <div class="flex items-center">
                                                <input id="checkbox-item-1" type="checkbox" value="product_number"
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary focus:ring-primary ">
                                                <label for="checkbox-item-1"
                                                    class="text-sm font-medium text-tertiary ms-2 ">Number</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="flex items-center">
                                                <input checked id="checkbox-item-2" type="checkbox" value="product_name"
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary focus:ring-primary ">
                                                <label for="checkbox-item-2"
                                                    class="text-sm font-medium text-tertiary ms-2 ">Name</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="flex items-center">
                                                <input id="checkbox-item-3" type="checkbox" value="product_price"
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary focus:ring-primary ">
                                                <label for="checkbox-item-3"
                                                    class="text-sm font-medium text-tertiary ms-2 ">Price</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            {{-- filter price --}}
                            <div>
                                <button id="dropdownFilterPrice" data-dropdown-toggle="filterPrice"
                                    class="inline-flex items-center px-5 py-2 text-sm font-medium text-center rounded-lg bg-gray-50 text-tertiary hover:bg-gray-200 focus:ring-0 focus:outline-none "
                                    type="button">
                                    <i data-lucide="filter" class="w-4 h-4 stroke-2 me-2"></i>
                                    <p>Price</p>
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <!-- Dropdown filter price -->
                                <div id="filterPrice"
                                    class="z-10 hidden w-48 bg-white border border-gray-200 divide-y divide-gray-100 rounded-lg shadow-lg">
                                    <ul class="p-3 space-y-3 text-sm text-gray-700 "
                                        aria-labelledby="dropdownFilterPrice">
                                        <li>
                                            <div class="flex items-center">
                                                <input id="checkbox-item-1" type="checkbox" value=""
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary focus:ring-primary ">
                                                <label for="checkbox-item-1"
                                                    class="text-sm font-medium text-tertiary ms-2 ">Default
                                                    checkbox</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="flex items-center">
                                                <input checked id="checkbox-item-2" type="checkbox" value=""
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary focus:ring-primary ">
                                                <label for="checkbox-item-2"
                                                    class="text-sm font-medium text-tertiary ms-2 ">Checked
                                                    state</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="flex items-center">
                                                <input id="checkbox-item-3" type="checkbox" value=""
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary focus:ring-primary ">
                                                <label for="checkbox-item-3"
                                                    class="text-sm font-medium text-tertiary ms-2 ">Default
                                                    checkbox</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            {{-- filter rating --}}
                            {{-- <div>
                                <button id="dropdownFilterRating" data-dropdown-toggle="filterRating"
                                    class="inline-flex items-center px-5 py-2 text-sm font-medium text-center rounded-lg bg-gray-50 text-tertiary hover:bg-gray-200 focus:ring-0 focus:outline-none "
                                    type="button">
                                    <i data-lucide="filter" class="w-4 h-4 stroke-2 me-2"></i>
                                    <p>Rating</p>
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <!-- Dropdown filter rating -->
                                <div id="filterRating"
                                    class="z-10 hidden w-48 bg-white border border-gray-200 divide-y divide-gray-100 rounded-lg shadow-lg">
                                    <ul class="p-3 space-y-3 text-sm text-gray-700 "
                                        aria-labelledby="dropdownFilterRating">
                                        <li>
                                            <div class="flex items-center">
                                                <input id="checkbox-item-1" type="checkbox" value=""
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary focus:ring-primary ">
                                                <label for="checkbox-item-1"
                                                    class="text-sm font-medium text-gray-900 ms-2 ">Default
                                                    checkbox</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="flex items-center">
                                                <input checked id="checkbox-item-2" type="checkbox" value=""
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary focus:ring-primary ">
                                                <label for="checkbox-item-2"
                                                    class="text-sm font-medium text-gray-900 ms-2 ">Checked
                                                    state</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="flex items-center">
                                                <input id="checkbox-item-3" type="checkbox" value=""
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary focus:ring-primary ">
                                                <label for="checkbox-item-3"
                                                    class="text-sm font-medium text-gray-900 ms-2 ">Default
                                                    checkbox</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                        <form action="{{ route('product.collections.search') }}" method="GET"
                            class="flex items-center max-w-lg">
                            {{-- @csrf --}}
                            <label for="voice-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                                    <i data-lucide="search" class="w-4 h-4 text-gray-500 stroke-2"></i>
                                </div>
                                <input type="text" id="search" name="search"
                                    class="bg-gray-50 border border-gray-200 text-tertiary text-sm rounded-lg focus:ring-primary focus:border-primary block w-full ps-10 p-2.5"
                                    placeholder="Cari Produk disini..." value="{{ request('search') }}" />
                            </div>
                            <button type="submit"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-white rounded-lg ms-2 bg-primary hover:bg-red-800 focus:ring-0 focus:outline-none focus:ring-primary">
                                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>Search
                            </button>
                        </form>
                    </div>
                </div>
                <div class="grid gap-4 mt-2 sm:grid-cols-2 md:mt-4 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($products as $product)
                        <form action="{{ route('product.collections.addCart') }}" method="POST"
                            class="p-6 bg-white border border-gray-200 shadow-sm rounded-2xl">
                            @csrf
                            {{-- hidden input product_id --}}
                            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                            <input type="hidden" name="quantity" value="1">
                            <div class="relative w-full h-56">
                                @if ($product['product_stock'] <= 0)
                                    <div
                                        class="absolute top-0 flex items-center justify-center w-full h-full start-0 bg-primary/5 backdrop-blur-sm backdrop-brightness-90 rounded-2xl">
                                        <span class="text-xs font-medium text-primary">Stok habis</span>
                                    </div>
                                @endif
                                @php
                                    // Decode JSON untuk mendapatkan array path
                                    $imageData = json_decode($product['product_image'], true);

                                    // Ambil path pertama dari array, jika ada, dan ambil nama file menggunakan basename
                                    $filePath = $imageData ? reset($imageData) : null;
                                    $fileName = $filePath ? basename($filePath) : null;

                                    // Gabungkan path direktori dengan nama file atau gunakan gambar default jika file tidak ada
                                    $imageUrl = $fileName
                                        ? asset('storage/images/products/' . $fileName)
                                        : asset('/storage/images/products/default-product.png');
                                @endphp

                                <img class="object-cover w-full h-full rounded-xl" src="{{ $imageUrl }}"
                                    alt="Product Image" loading="lazy" />
                            </div>
                            <div class="pt-6">
                                <div class="flex items-center justify-between gap-4 mb-4">
                                    @if ($product['discounts'])
                                        <span
                                            class="me-2 rounded bg-primary/15 px-2.5 py-0.5 text-xs font-medium text-primary ">Diskon
                                            {{ $product['discounts']->first()?->discount_percentage ?? 0 }}%</span>
                                    @else
                                        <span
                                            class="me-2 rounded bg-tertiary/10 px-2.5 py-0.5 text-xs font-medium text-tertiary ">Harga
                                            Terbaik</span>
                                    @endif

                                    <div class="flex items-center justify-end gap-1">
                                        <button type="button"
                                            data-modal-target="readProductModal-{{ $product['id'] }}"
                                            data-modal-toggle="readProductModal-{{ $product['id'] }}"
                                            class="p-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-900">
                                            <span class="sr-only"> View Product </span>
                                            <svg class="w-5 h-5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </button>
                                        {{-- modal view product --}}
                                        <div id="readProductModal-{{ $product['id'] }}" tabindex="-1"
                                            aria-hidden="true"
                                            class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                            <div class="relative w-full h-full max-w-2xl p-4 md:h-auto">
                                                <!-- Modal content -->
                                                <div class="relative p-4 bg-white shadow rounded-2xl sm:p-5">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex justify-between w-full pb-4 mb-4 border-b rounded-t sm:mb-5">
                                                        <h3 class="text-xl font-bold text-tertiary">Detail Produk</h3>
                                                        <div>
                                                            <button type="button"
                                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-tertiary rounded-lg text-sm p-1.5 inline-flex"
                                                                data-modal-toggle="readProductModal-{{ $product['id'] }}">
                                                                <svg aria-hidden="true" class="w-5 h-5"
                                                                    fill="currentColor" viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd"
                                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 sm:mb-5">
                                                        <div
                                                            class="grid grid-cols-3 text-xl text-tertiary md:text-2xl">
                                                            <div class="w-full col-span-2 text-start">
                                                                <h3 class="font-medium capitalize">
                                                                    {{ $product['product_name'] }}
                                                                </h3>
                                                            </div>
                                                            @if ($product['discounts']->isNotEmpty())
                                                                <p class="mb-1 text-sm font-bold text-tertiary">
                                                                    <span class="line-through">Rp.
                                                                        {{ number_format($product['product_price']) }}
                                                                    </span>
                                                                </p>
                                                                @php
                                                                    $discount =
                                                                        ($product['discounts']->first()
                                                                            ?->discount_percentage ??
                                                                            0 / 100) *
                                                                        $product['product_price'];
                                                                    $price_after_discount =
                                                                        $product['product_price'] - $discount;
                                                                @endphp
                                                                <p
                                                                    class="text-xl font-bold leading-tight text-primary">
                                                                    Rp.
                                                                    {{ number_format($price_after_discount, 0, ',', '.') }}
                                                                </p>
                                                            @else
                                                                <div class="w-full text-end">
                                                                    <p
                                                                        class="text-xl font-bold leading-tight text-tertiary">
                                                                        Rp.
                                                                        {{ number_format($product['product_price']) }}
                                                                    </p>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-2 gap-4 mb-4 md:grid-cols-3 sm:mb-5">
                                                        @php
                                                            // Decode JSON untuk mendapatkan array path gambar
                                                            $imageData = json_decode($product['product_image'], true);
                                                        @endphp

                                                        @if ($imageData)
                                                            @foreach ($imageData as $key => $filePath)
                                                                @php
                                                                    // Ambil nama file menggunakan basename
                                                                    $fileName = basename($filePath);

                                                                    // Gabungkan path direktori dengan nama file
                                                                    $imageUrl = asset(
                                                                        'storage/images/products/' . $fileName,
                                                                    );
                                                                @endphp

                                                                <img class="h-full mx-auto mb-4 rounded-xl"
                                                                    src="{{ $imageUrl }}"
                                                                    alt="Product Image {{ $key }}"
                                                                    loading="lazy" />
                                                            @endforeach
                                                        @else
                                                            <img class="h-full mx-auto rounded-xl"
                                                                src="{{ asset('/storage/images/products/default-product.png') }}"
                                                                alt="Default Product Image" loading="lazy" />
                                                        @endif
                                                    </div>
                                                    <dl>
                                                        <dt class="mb-2 font-semibold leading-none text-tertiary ">
                                                            Details</dt>
                                                        <dd class="mb-4 text-sm font-normal text-tertiary/60 sm:mb-5">
                                                            {{ $product['product_description'] }}
                                                        </dd>
                                                        <dt class="mb-2 font-semibold leading-none text-tertiary ">
                                                            Category</dt>
                                                        <dd class="mb-4 text-sm font-normal text-tertiary/60 sm:mb-5">
                                                            {{ $product['product_category'] }}
                                                        </dd>
                                                    </dl>
                                                    <div class="flex items-center justify-end">
                                                        <button type="submit"
                                                            class="inline-flex items-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-0 {{ $product['product_stock'] <= 0 ? 'cursor-not-allowed' : '' }}"
                                                            {{ $product['product_stock'] <= 0 ? 'disabled' : '' }}>
                                                            <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                                            </svg>
                                                            @if ($product['product_stock'] <= 0)
                                                                Stok habis
                                                            @else
                                                                Add to cart
                                                            @endif
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <p
                                        class="font-semibold leading-tight text-tertiary text-md min-h-12 hover:underline line-clamp-2">
                                        {{ $product['product_name'] }}</p>
                                </a>

                                <div class="flex items-center gap-2 mt-2">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-yellow-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                        </svg>

                                        <svg class="w-4 h-4 text-yellow-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                        </svg>

                                        <svg class="w-4 h-4 text-yellow-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                        </svg>

                                        <svg class="w-4 h-4 text-yellow-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                        </svg>

                                        <svg class="w-4 h-4 text-yellow-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                        </svg>
                                    </div>

                                    <p class="text-xs font-medium text-tertiary">5.0</p>
                                    <p class="text-xs font-medium text-gray-500">(455)</p>
                                </div>

                                <ul class="flex items-center gap-4 mt-2">
                                    <li class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                        </svg>
                                        <p class="text-xs font-medium text-gray-500">Fast Delivery</p>
                                    </li>

                                    <li class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                        </svg>
                                        <p class="text-xs font-medium text-gray-500">Best Price</p>
                                    </li>
                                </ul>

                                <div class="flex items-center justify-between gap-4 mt-4">
                                    <div>
                                        @if ($product['discounts']->isNotEmpty())
                                            <p class="mb-1 text-sm font-bold text-tertiary">
                                                <span class="line-through">Rp.
                                                    {{ number_format($product['product_price']) }} </span>
                                            </p>
                                            @php
                                                $discount =
                                                    ($product['discounts']->first()?->discount_percentage / 100) *
                                                    $product['product_price'];
                                                $price_after_discount = $product['product_price'] - $discount;
                                            @endphp
                                            <p class="text-lg font-bold leading-tight text-primary">Rp.
                                                {{ number_format($price_after_discount, 0, ',', '.') }}
                                            </p>
                                        @else
                                            <p class="text-lg font-bold leading-tight text-tertiary">Rp.
                                                {{ number_format($product['product_price']) }}
                                            </p>
                                        @endif
                                    </div>

                                    <button type="submit"
                                        class="inline-flex items-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-0 {{ $product['product_stock'] <= 0 ? 'cursor-not-allowed' : '' }}"
                                        {{ $product['product_stock'] <= 0 ? 'disabled' : '' }}>
                                        <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                        </svg>
                                        @if ($product['product_stock'] <= 0)
                                            Stok habis
                                        @else
                                            Add to cart
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
                <div class="w-full mt-4 text-center md:mt-8">
                    {{ $products->links() }}
                    {{-- <button type="button"
                    class="flex items-center px-5 py-2.5 mx-auto text-sm font-medium text-white border border-gray-200 rounded-full bg-primary hover:bg-red-800 focus:z-10 focus:outline-none focus:ring-2 focus:ring-gray-100">
                    Load More
                    <i data-lucide="chevrons-down" class="w-4 h-4 stroke-2 ms-2 animate-bounce"></i>
                </button> --}}
                </div>
            </div>
        </div>
    </section>

    {{-- footer --}}
    <livewire:customer.components.footer />
</x-guest-layout>
