@props(['id', 'data'])

<div id="detail-modal-product{{ $id }}" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                <h3 class="text-2xl font-bold text-tertiary">
                    #{{ $data['product_number'] }}
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
            <div class="flex flex-col gap-6 p-4 md:p-5">
                <div class="grid grid-flow-row-dense grid-cols-2 gap-2">
                    @foreach ($data['images'] as $index => $image)
                        <div class="{{ $index % 2 === 0 ? 'col-span-2' : '' }}">
                            <img src="{{ $image['url'] ? asset('/storage/images/products/' . $image['url']) : asset('storage/images/mang-ohing-logo.png') }}"
                                alt="product-image" class="object-cover w-full rounded-lg h-52">
                        </div>
                    @endforeach
                </div>
                <div class="pt-4 space-y-4 border-t border-gray-200">
                    <h1 class="text-lg font-semibold">Details</h1>
                    <div>
                        <div class="flex flex-col items-start gap-2 mb-4">
                            <x-input-label class="text-xs text-tertiary" :value="__('Product Name')" />
                            <x-text-input type="text" class="w-full text-sm uppercase border-gray-200 text-tertiary"
                                value="{{ $data['product_name'] }}" readonly disabled />
                        </div>
                        <div class="flex flex-col items-start gap-2 mb-4">
                            <x-input-label for="product_name" class="text-xs text-tertiary" :value="__('Descriptions')" />
                            <textarea type="text" class="w-full text-sm border border-gray-300 rounded-lg text-tertiary" rows="5" readonly
                                disabled>{{ $data['product_description'] }}</textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="flex flex-col items-start gap-2">
                                <x-input-label class="text-xs text-tertiary" :value="__('Price')" />
                                <x-text-input type="text" class="w-full text-sm border-gray-200 text-tertiary"
                                    value="Rp. {{ number_format($data['product_price'], 0, ',', '.') }}" readonly
                                    disabled />
                            </div>
                            <div class="flex flex-col items-start gap-2">
                                <x-input-label class="text-xs text-tertiary" :value="__('Stocks')" />
                                <x-text-input type="text" class="w-full text-sm border-gray-200 text-tertiary"
                                    value="{{ $data['product_stock'] }} pcs" readonly disabled />
                            </div>
                            <div class="flex flex-col items-start gap-2">
                                <x-input-label class="text-xs text-tertiary" :value="__('Category')" />
                                <x-text-input type="text" class="w-full text-sm border-gray-200 text-tertiary"
                                    value="{{ $data['product_category'] }}" readonly disabled />
                            </div>
                            <div class="flex flex-col items-start gap-2">
                                <x-input-label class="text-xs text-tertiary" :value="__('Tags')" />
                                <x-text-input type="text" class="w-full text-sm border-gray-200 text-tertiary"
                                    value="{{ $data['product_tag'] }}" readonly disabled />
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col items-start gap-2">
                                <x-input-label class="text-xs text-tertiary" :value="__('Weight')" />
                                <x-text-input type="text" class="w-full text-sm border-gray-200 text-tertiary"
                                    value="{{ $data['product_weight'] }} cm" readonly disabled />
                            </div>
                            <div class="flex flex-col items-start gap-2">
                                <x-input-label class="text-xs text-tertiary" :value="__('length')" />
                                <x-text-input type="text" class="w-full text-sm border-gray-200 text-tertiary"
                                    value="{{ $data['product_length'] }} cm" readonly disabled />
                            </div>
                            <div class="flex flex-col items-start gap-2">
                                <x-input-label class="text-xs text-tertiary" :value="__('Breadth')" />
                                <x-text-input type="text" class="w-full text-sm border-gray-200 text-tertiary"
                                    value="{{ $data['product_breadth'] }} cm" readonly disabled />
                            </div>
                            <div class="flex flex-col items-start gap-2">
                                <x-input-label class="text-xs text-tertiary" :value="__('width')" />
                                <x-text-input type="text" class="w-full text-sm border-gray-200 text-tertiary"
                                    value="{{ $data['product_width'] }} cm" readonly disabled />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div
                class="flex items-center justify-end w-full gap-3 p-4 border-t border-gray-200 rounded-b md:p-5 rtl:space-x-reverse">
                <button data-modal-hide="detail-modal-product{{ $id }}" type="button"
                    class="text-white bg-primary hover:bg-red-800 focus:ring-0 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Close</button>
                <a href="{{ route('dashboard.admin.products.edit', $id) }}">
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-0 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Edit
                        Product</button>
                </a>
            </div>
        </div>
    </div>
</div>
