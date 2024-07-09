<x-guest-layout>
    <section
        class="relative z-0 w-full pt-12 pb-12 min-h-fit lg:min-h-fit lg:pb-16 lg:pt-16 isolate bg-background food-pattern">
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="md:gap-6 lg:flex lg:items-start ">
                <div class="flex-none w-full mx-auto lg:max-w-2xl xl:max-w-4xl">
                    <div class="flex items-end justify-between w-full mb-6">
                        <h2 class="text-xl font-semibold text-tertiary sm:text-2xl">Keranjang Belanja </h2>
                        <a href="#" class="text-sm font-medium text-primary hover:underline">Remove all</a>
                    </div>
                    <div class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6">
                        <table class="w-full text-sm text-left text-tertiary" id="tableCartList">
                            <thead class="text-xs uppercase border-b text-tertiary/60 ">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all-search" type="checkbox"
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary focus:ring-primary focus:ring-2">
                                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 rounded-s-lg">
                                        Produk
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Quantity
                                    </th>
                                    <th scope="col" class="px-6 py-3 rounded-e-lg">
                                        Harga
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataCart as $data)
                                    <tr class="py-2 bg-white border-b" id="trCartList"
                                        data-trCartList = "{{ $data['id'] }}">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-product-{{ $data['id'] }}" type="checkbox"
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary focus:ring-primary focus:ring-2"
                                                    data-id="{{ $data['id'] }}">
                                                <label for="checkbox-product-{{ $data['id'] }}"
                                                    class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="flex items-start px-6 py-4">
                                            <a href="#" class="shrink-0 ">
                                                <img class="object-cover w-24 h-24"
                                                    src="{{ $data['product']['images'] ? asset('storage/images/products/' . $data['product']['images'][0]['url']) : asset('/storage/images/products/default-product.png') }}"
                                                    alt="image-{{ $data['product']['product_name'] }}}" />
                                            </a>
                                            <div class="ml-4">
                                                <a href="#"
                                                    class="text-base font-medium text-tertiary hover:underline line-clamp-2">{{ $data['product']['product_name'] }}</a>
                                                <p class="mt-2 text-sm font-normal text-tertiary/50">Diskon:
                                                    {{ $data['product.discounts'] ? $data['product.discounts']['discount_percentage'] . '%' : '0%' }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="relative flex items-center max-w-[8rem] mx-auto">
                                                <button type="button" id="decrement-button-{{ $data['id'] }}"
                                                    data-input-counter-decrement="quantity-input-{{ $data['id'] }}"
                                                    class="h-10 p-3 bg-gray-100 border border-gray-200 hover:bg-gray-200 rounded-s-lg focus:ring-gray-100 focus:ring-0 focus:outline-none">
                                                    <svg class="w-2 h-2 text-tertiary " aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                    </svg>
                                                </button>
                                                <input type="text" id="quantity-input-{{ $data['id'] }}"
                                                    data-input-counter aria-describedby="helper-text-explanation"
                                                    data-id="{{ $data['id'] }}"
                                                    data-price="{{ $data['product']['product_price'] }}"
                                                    class="bg-gray-100 border-x-0 border-gray-200 h-10 text-center text-tertiary text-sm  focus:ring-0 focus:ring-primary block w-full py-2.5 "
                                                    value="{{ $data['quantity'] }}" min="1" />
                                                <button type="button" id="increment-button-{{ $data['id'] }}"
                                                    data-input-counter-increment="quantity-input-{{ $data['id'] }}"
                                                    class="h-10 p-3 bg-gray-100 border border-gray-200 hover:bg-gray-200 rounded-e-lg focus:ring-gray-100 focus:ring-0 focus:outline-none">
                                                    <svg class="w-2 h-2 text-tertiary" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M9 1v16M1 9h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <button type="button" data-modal-target="deleteCart-{{ $data['id'] }}"
                                                data-modal-toggle="deleteCart-{{ $data['id'] }}"
                                                class="flex items-center mx-auto mt-4 text-xs font-medium text-tertiary hover:text-primary hover:underline">
                                                <i data-lucide="trash-2" class="w-3 h-3 mr-1"></i>
                                                Remove
                                            </button>
                                        </td>
                                        <td id="subtotal-{{ $data['id'] }}"
                                            class="px-6 py-4 text-base font-bold text-tertiary">
                                            <p class="subtotal-value text-nowrap"> Rp.
                                                {{ number_format($data['subtotal'], 0, ',', '.') }},00</p>
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
                                                    <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 "
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">
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
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-0 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                            Yes, I'm sure
                                                        </button>
                                                        </fo>
                                                        <button data-modal-hide="deleteCart-{{ $data['id'] }}"
                                                            type="button"
                                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-0 focus:ring-gray-100 ">No,
                                                            cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Total --}}
                <div class="flex-1 max-w-4xl mx-auto mt-6 space-y-6 lg:mt-0 lg:w-full">
                    <div class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6">
                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-tertiary/50 hover:text-tertiary">Subtotal
                                    </dt>
                                    <dd class="text-base font-medium text-tertiary subtotal-product">Rp. 0.00</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-tertiary/50 hover:text-tertiary">Diskon
                                    </dt>
                                    <dd class="text-base font-medium text-green-600">- Rp. 0.00</dd>
                                </dl>
                            </div>

                            <dl class="flex items-center justify-between gap-4 pt-2 border-t border-gray-200">
                                <dt class="text-base font-bold text-tertiary">Total</dt>
                                <dd class="text-base font-bold text-tertiary total-price">Rp. 0.00</dd>
                            </dl>
                        </div>

                        <a href="{{ route('checkout') }}"
                            class="flex w-full items-center justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-0 focus:ring-primary-300">Proceed
                            to Checkout</a>

                        <div class="flex items-center justify-center gap-2">
                            <span class="text-sm font-normal text-tertiary/50 hover:text-tertiary"> or </span>
                            <a href="{{ route('product.collections') }}" title=""
                                class="inline-flex items-center gap-2 text-sm font-medium underline text-primary hover:no-underline">
                                Continue Shopping
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

            {{-- rekomendasi --}}
            <div class="hidden xl:mt-8 xl:block">
                <h3 class="text-2xl font-semibold text-tertiary">Rekomendasi</h3>
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
            </div>
        </div>
    </section>
    {{-- footer --}}
    <livewire:customer.components.footer />
</x-guest-layout>
