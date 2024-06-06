@props(['id', 'product'])

<div id="detail-modal-product{{ $id }}" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                <h3 class="text-xl font-semibold text-tertiary">
                    {{ $product->product_name }}
                </h3>
                <button type="button"
                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-tertiary ms-auto"
                    data-modal-hide="detail-modal-product{{ $id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="grid grid-cols-2 p-4 space-x-6 md:p-5">
                <div class="space-y-4">
                    <h1 class="mb-4 text-lg font-semibold">Product Informations</h1>
                    <div class="flex flex-row items-center gap-2">
                        <p class="text-base text-tertiary">Product Name:</p>
                        <h1 class="text-base font-semibold text-tertiary">{{ $product->product_name }}</h1>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                        <p class="text-base text-tertiary">Product Number:</p>
                        <h1 class="text-base font-semibold text-tertiary">#{{ $product->product_number }}</h1>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                        <p class="text-base text-tertiary">Category:</p>
                        <h1 class="text-base font-semibold text-tertiary">{{ $product->product_category }}</h1>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                        <p class="text-base text-tertiary">Price:</p>
                        <h1 class="text-base font-semibold text-tertiary">Rp.
                            {{ number_format($product->product_price, 0, ',', '.') }}</h1>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                        <p class="text-base text-tertiary">Stocks:</p>
                        <h1 class="text-base font-semibold text-tertiary">{{ $product->product_stock }} pcs</h1>
                    </div>
                    <div class="flex flex-row items-start gap-2">
                        <p class="text-base text-tertiary">Description:</p>
                        <h1 class="text-base font-semibold text-tertiary">"{{ $product->product_description }}"</h1>
                    </div>
                    <div class="flex flex-col items-start gap-4">
                        <h1 class="text-base text-tertiary">Product Images:</h1>
                        <div class="flex gap-2 flex-nowrap">
                            @php
                                $image = json_decode($product->product_images, true);
                            @endphp

                            @foreach ($image as $img)
                                <div class="w-full rounded-lg">
                                    <img src="{{ asset('storage/images/products/' . $img) }}" width="128"
                                        height="128" alt="product-image" class="object-cover rounded-lg">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <h1 class="mb-4 text-lg font-semibold">Product Details</h1>
                    <div class="flex flex-row items-start gap-2">
                        <p class="text-base text-tertiary">Tags:</p>
                        <h1 class="text-base font-semibold text-tertiary">"{{ $product->product_tag }}"</h1>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                        <p class="text-base text-tertiary">Weight:</p>
                        <h1 class="text-base font-semibold text-tertiary">{{ $product->product_weight }} kg</h1>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                        <p class="text-base text-tertiary">Length:</p>
                        <h1 class="text-base font-semibold text-tertiary">{{ $product->product_length }} cm</h1>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                        <p class="text-base text-tertiary">Breadth:</p>
                        <h1 class="text-base font-semibold text-tertiary">{{ $product->product_breadth }} cm</h1>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                        <p class="text-base text-tertiary">Width:</p>
                        <h1 class="text-base font-semibold text-tertiary">{{ $product->product_width }} cm</h1>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                        <p class="text-base text-tertiary">Discount:</p>
                        <h1 class="text-base font-semibold text-tertiary">{{ $product->discount_percentage }}%</h1>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                        <p class="text-base text-tertiary">Minimum Orders:</p>
                        <h1 class="text-base font-semibold text-tertiary">
                            {{ number_format($product->minimum_order, 0, ',', '.') }}</h1>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                        <p class="text-base text-tertiary">Discount Period:</p>
                        <div class="flex flex-row gap-4">
                            <h1 class="text-base font-semibold text-tertiary">{{ $product->discount_period_start }}
                            </h1>
                            <h1 class="text-base text-tertiary">to</h1>
                            <h1 class="text-base font-semibold text-tertiary">{{ $product->discount_period_end }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div
                class="flex items-center justify-end w-full p-4 space-x-3 border-t border-gray-200 rounded-b md:p-5 rtl:space-x-reverse">
                <button data-modal-hide="extralarge-modal" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit
                    Product</button>
            </div>
        </div>
    </div>
</div>
