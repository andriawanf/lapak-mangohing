<x-guest-layout>
    <section class="relative z-0 w-full min-h-screen pt-12 pb-12 lg:pb-16 lg:pt-16 isolate bg-background food-pattern">
        <div class="w-full px-4 mx-auto lg:max-w-screen-xl sm:px-6 lg:px-8">
            <h2 class="mb-8 text-xl font-semibold text-tertiary sm:text-lg">Keranjang Belanja </h2>

            <form action="{{ route('checkout') }}" method="POST" id="product-selection-form">
                @csrf
                @method('POST')
                <div class="md:gap-4 lg:flex lg:items-start ">
                    <div class="flex-none w-full mx-auto lg:max-w-2xl xl:max-w-4xl">
                        <div
                            class="relative p-4 space-y-4 overflow-x-auto bg-white border border-gray-200 rounded-lg shadow-sm sm:rounded-lg sm:p-6">
                            <table class="w-full text-sm text-left text-tertiary rtl:text-right ">
                                <thead class="text-xs uppercase text-tertiary/50 ">
                                    <tr class="bg-tertiary/5">
                                        <th scope="col" class="p-4 rounded-tl-sm">
                                            <div class="flex items-center">
                                                <input id="checkbox-all-search" type="checkbox"
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary focus:ring-primary focus:ring-2">
                                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-16 py-3">
                                            <span class="sr-only">Image</span>
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Product
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Qty
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Price
                                        </th>
                                        <th scope="col" class="px-6 py-3 rounded-tr-sm">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($dataCart == null)
                                        <tr>
                                            <td colspan="8" class="p-4 text-center">Kamu belum memiliki produk
                                                apapun.
                                                <span><a class="text-primary hover:underline"
                                                        href="{{ route('product.collections') }}">Yuk belanja
                                                        dulu</a></span>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($dataCart->cartItems as $data)
                                            <tr class="bg-white border-b hover:bg-gray-50" id="trCartList"
                                                data-trCartList="{{ $data['id'] }}">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-product-{{ $data['id'] }}" type="checkbox"
                                                            name="product_ids[]" value="{{ $data->product->id }}"
                                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary focus:ring-primary focus:ring-2"
                                                            data-id="{{ $data->product->id }}">
                                                        <label for="checkbox-product-{{ $data['id'] }}"
                                                            class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <td class="p-4">
                                                    @php
                                                        // Decode JSON untuk mendapatkan array path
                                                        $imageData = json_decode(
                                                            $data['product']['product_image'],
                                                            true,
                                                        );

                                                        // Ambil path pertama dari array, jika ada, dan ambil nama file menggunakan basename
                                                        $filePath = $imageData ? reset($imageData) : null;
                                                        $fileName = $filePath ? basename($filePath) : null;

                                                        // Gabungkan path direktori dengan nama file atau gunakan gambar default jika file tidak ada
                                                        $imageUrl = $fileName
                                                            ? asset('storage/images/products/' . $fileName)
                                                            : asset('/storage/images/products/default-product.png');
                                                    @endphp
                                                    <img src="{{ $imageUrl }}"
                                                        class="w-16 max-w-full max-h-full md:w-32 rounded-xl">
                                                </td>
                                                <td class="px-6 py-4 font-semibold text-gray-900 ">
                                                    <a href="#"
                                                        class="font-medium text-md text-tertiary hover:underline line-clamp-2">{{ $data['product']['product_name'] }}</a>
                                                    <p class="mt-1 text-sm font-normal text-primary"
                                                        data-discount={{ number_format(
                                                            $data->product->discounts->first() ? $data->product->discounts->first()->discount_percentage : 0,
                                                        ) }}>
                                                        Diskon:
                                                        {{ $data->product->discounts->first()
                                                            ? number_format($data->product->discounts->first()->discount_percentage) . '%'
                                                            : '0%' }}
                                                    </p>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center">
                                                        <button
                                                            class="inline-flex items-center justify-center w-6 h-6 p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200"
                                                            type="button" id="decrement-button-{{ $data['id'] }}"
                                                            data-counter-decrement="quantity-input-{{ $data['id'] }}">
                                                            <span class="sr-only">Quantity button</span>
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 18 2">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M1 1h16" />
                                                            </svg>
                                                        </button>
                                                        <div class="ms-3">
                                                            <input type="number"
                                                                id="quantity-input-{{ $data['id'] }}"
                                                                aria-describedby="helper-text-explanation"
                                                                data-id="{{ $data['id'] }}"
                                                                data-price="{{ $data['product']['product_price'] }}"
                                                                class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1"
                                                                value="{{ $data['quantity'] }}" min="1" />
                                                        </div>
                                                        <button
                                                            class="inline-flex items-center justify-center w-6 h-6 p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full ms-3 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200"
                                                            type="button" id="increment-button-{{ $data['id'] }}"
                                                            data-counter-increment="quantity-input-{{ $data['id'] }}">
                                                            <span class="sr-only">Quantity button</span>
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 18 18">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M9 1v16M1 9h16" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 font-semibold text-gray-900 "
                                                    id="subtotal-{{ $data['id'] }}">
                                                    @php
                                                        $subtotal =
                                                            $data['product']['product_price'] * $data['quantity'];
                                                    @endphp
                                                    <p class="subtotal-value text-nowrap"> Rp.
                                                        {{ number_format($data->price, 0, ',', '.') }},00
                                                    </p>
                                                    @if ($data->product->discounts->first())
                                                        <p
                                                            class="text-xs mt-0.5 line-through subtotal-value text-nowrap text-tertiary/50">
                                                            Rp.
                                                            {{ number_format($data->product->product_price, 0, ',', '.') }},00
                                                        </p>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4">
                                                    <button type="button"
                                                        data-modal-target="deleteCart-{{ $data['id'] }}"
                                                        data-modal-toggle="deleteCart-{{ $data['id'] }}"
                                                        class="flex items-center mx-auto mt-4 text-xs font-medium text-tertiary hover:text-primary hover:underline">
                                                        <i data-lucide="trash-2" class="w-3 h-3 mr-1"></i>
                                                        Remove
                                                    </button>
                                                </td>
                                            </tr>
                                            {{-- modal --}}
                                            <div id="deleteCart-{{ $data['id'] }}" tabindex="-1"
                                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-md max-h-full p-4">
                                                    <div class="relative bg-white rounded-lg shadow">
                                                        <button type="button"
                                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                                            data-modal-hide="deleteCart-{{ $data['id'] }}">
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                        <div class="p-4 text-center md:p-5">
                                                            <svg class="w-12 h-12 mx-auto mb-4 text-tertiary/40 "
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                            </svg>
                                                            <h3 class="mb-5 font-normal text-gray-500 text-md ">
                                                                Are you sure you want to delete <span
                                                                    class="font-bold text-primary">{{ $data['product']['product_name'] }}</span>
                                                                ?
                                                            </h3>
                                                            <form
                                                                action="{{ route('product.collections.deleteCart', $data['id']) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="text-white bg-primary hover:bg-red-800 focus:ring-0 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                    Yes, I'm sure
                                                                </button>
                                                                </fo>
                                                                <button
                                                                    data-modal-hide="deleteCart-{{ $data['id'] }}"
                                                                    type="button"
                                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-tertiary focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary focus:z-10 focus:ring-0 focus:ring-gray-100 ">No,
                                                                    cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Total --}}
                    <div class="flex-1 max-w-4xl mx-auto mt-6 space-y-6 lg:mt-0 lg:w-full">
                        <div class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6">
                            <h2 class="col-span-2 font-semibold text-md lg:text-md text-tertiary">Rincian Keranjang
                            </h2>
                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Subtotal
                                        </dt>
                                        <dd class="text-sm font-medium text-tertiary subtotal-product">Rp. 0,00</dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Diskon
                                        </dt>
                                        <dd class="text-sm font-medium text-tertiairy discount-percent">0%</dd>
                                    </dl>
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-sm font-normal text-tertiary/50 hover:text-tertiary">Hemat
                                        </dt>
                                        <dd class="text-sm font-medium text-primary total-discount">-Rp. 0,00</dd>
                                    </dl>
                                </div>

                                <dl class="flex items-center justify-between gap-4 pt-2 border-t border-gray-200">
                                    <dt class="font-bold text-md text-tertiary">Jumlah Total</dt>
                                    <dd class="font-bold text-md text-tertiary total-price">Rp. 0,00</dd>
                                </dl>
                            </div>

                            <button type="submit"
                                class="flex w-full items-center justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-0 focus:ring-primary-300">Checkout</button>

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
                </div>
            </form>
            {{-- rekomendasi --}}
            {{-- <div class="hidden xl:mt-8 xl:block">
                <h3 class="text-xl font-semibold text-tertiary">Rekomendasi</h3>
                <div class="grid grid-cols-3 gap-4 mt-6 sm:mt-8">
                    <div class="p-6 space-y-6 overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                        <a href="#" class="overflow-hidden rounded">
                            <img class="mx-auto h-44 w-44 dark:hidden"
                                src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg"
                                alt="imac image" />
                            <img class="hidden mx-auto h-44 w-44 dark:block"
                                src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg"
                                alt="imac image" />
                        </a>
                        <div>
                            <a href="#"
                                class="text-lg font-semibold leading-tight text-tertiary hover:underline">iMac
                                27”</a>
                            <p class="mt-2 text-base font-normal text-tertiary/50">This
                                generation has some improvements, including a longer continuous battery life.
                            </p>
                        </div>
                        <div>
                            <p class="text-lg font-bold text-tertiary">
                                <span class="line-through"> $399,99 </span>
                            </p>
                            <p class="text-lg font-bold leading-tight text-primary">$299</p>
                        </div>
                        <div class="mt-6 flex items-center gap-2.5">
                            <button data-tooltip-target="favourites-tooltip-1" type="button"
                                class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white p-2.5 text-sm font-medium text-tertiary hover:bg-gray-100 hover:text-red-800 focus:z-10 focus:outline-none focus:ring-0 focus:ring-gray-100">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z">
                                    </path>
                                </svg>
                            </button>
                            <div id="favourites-tooltip-1" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip ">
                                Add to favourites
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <button type="button"
                                class="inline-flex w-full items-center justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium  text-white hover:bg-red-800 focus:outline-none focus:ring-0 focus:ring-primary-300">
                                <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                                </svg>
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    {{-- footer --}}
    <livewire:customer.components.footer />
</x-guest-layout>
