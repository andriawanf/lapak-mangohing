@props(['id', 'discounts', 'products'])

<div id="{{ $id == 'addDiscountModal' ? 'addDiscountModal' : 'editDiscountModal-' . $id }}" tabindex="-1"
    aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 ">
                <h3 class="text-lg font-semibold text-tertiary ">
                    {{ $id == 'addDiscountModal' ? 'Create Discount' : 'Edit Discount' }}
                </h3>
                <button type="button"
                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-tertiary ms-auto"
                    data-modal-hide="{{ $id == 'addDiscountModal' ? 'addDiscountModal' : 'editDiscountModal-' . $id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5"
                action="{{ $id == 'addDiscountModal' ? route('dashboard.admin.products.discount.store') : route('dashboard.admin.products.discount.update', $id) }}"
                method="POST">
                @csrf
                @if ($id != 'addDiscountModal')
                    @method('PUT')
                @endif
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="col-span-2">
                        <x-input-label for="product_id" class="block mb-2 text-xs text-tertiary/60">
                            Select product <span class="text-red-500">*</span>
                        </x-input-label>
                        <select id="product_id" name="product_id"
                            class="w-full text-sm border border-gray-300 rounded-md bg-gray-50 text-tertiary focus:ring-primary focus:border-primary">
                            <option value="">Select product</option>
                            @if ($id == 'addDiscountModal')
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                @endforeach
                            @else
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ $product->id == $discounts->product_id ? 'selected' : '' }}>
                                        {{ $product->product_name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('product_id')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <x-input-label for="discount_percentage" class="block mb-2 text-xs text-tertiary/60">
                            Discount <span class="text-red-500">*</span>
                        </x-input-label>
                        <x-text-input type="number" name="discount_percentage" id="discount_percentage"
                            class="w-full text-sm" placeholder="10%"
                            value="{{ $id == 'addDiscountModal' ? '' : $discounts->discount_percentage }}" />
                        @error('discount_percentage')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <x-input-label for="minimum_order" class="block mb-2 text-xs text-tertiary/60">
                            Minimum Order <span class="text-red-500">*</span>
                        </x-input-label>
                        <x-text-input type="number" name="minimum_order" id="minimum_order" class="w-full text-sm"
                            placeholder="Rp.2999"
                            value="{{ $id == 'addDiscountModal' ? '' : $discounts->minimum_order }}" />
                        @error('minimum_order')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div date-rangepicker datepicker-autohide datepicker-orientation="top left" datepicker-buttons
                        datepicker-autoselect-today datepicker-format="yyyy-mm-dd"
                        class="grid grid-cols-2 col-span-2 gap-4">
                        <div class="col-span-2 sm:col-span-1">
                            <x-input-label for="start_date" class="block mb-2 text-xs text-tertiary/60">
                                Peroid Start <span class="text-red-500">*</span>
                            </x-input-label>
                            <div class="relative">
                                <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <x-text-input type="text" name="start_date" id="start_date" label="start_date"
                                    class="block w-full text-sm ps-10" placeholder="Select date start"
                                    value="{{ $id == 'addDiscountModal' ? '' : $discounts->start_date }}" />
                            </div>
                            @error('start_date')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <x-input-label for="end_date" class="block mb-2 text-xs text-tertiary/60">
                                Peroid End <span class="text-red-500">*</span>
                            </x-input-label>
                            <div class="relative">
                                <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <x-text-input type="text" name="end_date" id="end_date" label="end_date"
                                    class="block w-full text-sm ps-10" placeholder="Select date end"
                                    value="{{ $id == 'addDiscountModal' ? '' : $discounts->end_date }}" />
                            </div>
                            @error('end_date')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    {{ $id == 'addDiscountModal' ? 'Create Discount' : 'Update Discount' }}
                </button>
            </form>
        </div>
    </div>
</div>
