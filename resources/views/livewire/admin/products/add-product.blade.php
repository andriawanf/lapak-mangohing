<div class="w-full px-3 py-6">
    <div class="p-4 bg-white border border-gray-200 rounded-xl">
        <div class="flex items-end justify-between">
            <div class="mb-6">
                <h3 class="mb-2 text-xl font-bold text-tertiary">Add Product</h3>
                <span class="text-base font-normal text-gray-500">This is a form for add new product</span>
            </div>
            @if (session()->has('success'))
                <div id="toast-success"
                    class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow"
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
                    <div class="text-sm font-normal ms-3">{{ session('success') }}</div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 "
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
        </div>
        <form action="{{ route('dashboard.admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 space-x-6">
                <div class="space-y-6">
                    {{-- input product name --}}
                    <div>
                        <x-input-label for="product_name" :value="__('Product Name')" class="mb-2" />
                        <x-text-input type="text" name="product_name" wire:model='product_name' id="product_name"
                            label="product_name" class="w-full" value="{{ old('product_name') }}" />
                        @error('product_name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- input product number & product category --}}
                    <div class="grid grid-cols-2 space-x-6">
                        <div>
                            <x-input-label for="product_number" :value="__('Product Number')" class="mb-2" />
                            <x-text-input type="text" name="product_number" wire:model='product_number'
                                id="product_number" label="product_number" class="w-full"
                                value="{{ old('product_number') }}" />
                            @error('product_number')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-input-label for="product_category" :value="__('Product Category')" class="mb-2" />
                            <select id="product_category" name="product_category" wire:model='product_category'
                                class="w-full text-base border border-gray-300 rounded-md bg-gray-50 text-tertiary focus:ring-primary focus:border-primary"
                                value="{{ old('product_category') }}">

                                <option value="">Chosee type</option>
                                <option value="makaroni">Makaroni</option>
                                <option value="keripik">Keripik</option>
                                <option value="kerupuk">Kerupuk</option>
                            </select>
                            @error('product_category')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    {{-- input product price & product stock --}}
                    <div class="grid grid-cols-2 space-x-6">
                        <div>
                            <x-input-label for="product_price" :value="__('Price')" class="mb-2" />
                            <x-text-input type="number" name="product_price" wire:model='product_price'
                                id="product_price" label="product_price" class="w-full"
                                value="{{ old('product_price') }}" />
                            @error('product_price')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-input-label for="product_stock" :value="__('Stocks')" class="mb-2" />
                            <x-text-input type="number" name="product_stock" wire:model='product_stock'
                                id="product_stock" label="product_stock" class="w-full"
                                value="{{ old('product_stock') }}" />
                            @error('product_stock')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    {{-- input product description --}}
                    <div>
                        <x-input-label for="product_description" :value="__('Descriptions')" class="mb-2" />
                        <textarea id="product_description" rows="14" name="product_description" wire:model='product_description'
                            class="block p-2.5 w-full text-sm text-tertiary bg-gray-white rounded-lg border border-gray-300 focus:ring-primary focus:border-primary"
                            placeholder="Write your thoughts here..." value="{{ old('product_description') }}"></textarea>
                    </div>
                    {{-- input discount --}}
                    <div class="grid grid-cols-2 space-x-6">
                        <div>
                            <x-input-label for="discount_percentage" :value="__('Discount Type')" class="mb-2" />
                            <x-text-input type="number" name="discount_percentage" wire:model='discount_percentage'
                                id="discount_percentage" label="discount_percentage" class="w-full"
                                placeholder="10%" value="{{ old('discount_percentage') }}" />
                            @error('discount_percentage')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-input-label for="minim_orders" :value="__('Minimum Orders Amount')" class="mb-2" />
                            <x-text-input type="number" name="minim_orders" wire:model='minim_orders'
                                id="minim_orders" label="minim_orders" class="w-full"
                                placeholder="Enter minimim amount" value="{{ old('minim_orders') }}" />
                            @error('minim_orders')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 space-x-6">
                        <div>
                            <x-input-label for="discount_period_start" :value="__('Discount Peroid Start')" class="mb-2" />
                            <x-text-input type="date" name="discount_period_start"
                                wire:model='discount_period_start' id="discount_period_start"
                                label="discount_period-start" class="w-full" placeholder="Enter discount type"
                                value="{{ old('discount_period_start') }}" />
                            @error('discount_period_start')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-input-label for="discount_period_end" :value="__('Discount Peroid End')" class="mb-2" />
                            <x-text-input type="date" name="discount_period_end" wire:model='discount_period_end'
                                id="discount_period_end" label="discount_period_end" class="w-full"
                                placeholder="Enter minimim amount" value="{{ old('discount_period_end') }}" />
                            @error('discount_period_end')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="space-y-6">
                    {{-- input product tags --}}
                    <div>
                        <x-input-label for="product_tag" :value="__('Tags')" class="mb-2" />
                        <x-text-input type="text" name="product_tag" wire:model='product_tag' id="product_tag"
                            label="product_tag" class="w-full" value="{{ old('product_tag') }}" />
                        @error('product_tag')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- input product weight --}}
                    <div>
                        <x-input-label for="product_weight" :value="__('Item Weight (kg)')" class="mb-2" />
                        <x-text-input type="number" name="product_weight" wire:model='product_weight'
                            id="product_weight" label="product_weight" class="w-full"
                            value="{{ old('product_weight') }}" />
                        @error('product_weight')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- input product dimension --}}
                    <div class="grid grid-cols-3 space-x-6">
                        <div>
                            <x-input-label for="product_length" :value="__('Length (cm)')" class="mb-2" />
                            <x-text-input type="number" name="product_length" wire:model='product_length'
                                id="product_length" label="product_length" class="w-full"
                                value="{{ old('product_length') }}" />
                            @error('product_length')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-input-label for="product_breadth" :value="__('Breadth (cm)')" class="mb-2" />
                            <x-text-input type="number" name="product_breadth" wire:model='product_breadth'
                                id="product_breadth" label="product_breadth" class="w-full"
                                value="{{ old('product_breadth') }}" />
                            @error('product_breadth')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-input-label for="product_width" :value="__('Width (cm)')" class="mb-2" />
                            <x-text-input type="number" name="product_width" wire:model='product_width'
                                id="product_width" label="product_width" class="w-full"
                                value="{{ old('product_width') }}" />
                            @error('product_width')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    {{-- input product description --}}
                    <div>
                        <x-input-label for="product_images" :value="__('Product Images')" class="mb-2" />
                        <div class="grid grid-cols-3 gap-3" id="image_array_preview">
                            {{-- image preview --}}
                        </div>
                        <div class="flex items-center justify-center w-full mt-3">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-tertiary" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-tertiary"><span class="font-semibold">Click
                                            to upload</span> or drag and drop</p>
                                    <p class="text-xs text-tertiary">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)
                                    </p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden" name="product_images[]"
                                    multiple accept="image/*" value="{{ old('product_images') }}" />
                            </label>
                        </div>
                        @error('product_images')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>


                </div>
            </div>
            <div class="flex items-center justify-end gap-3 mt-10">
                <button type="submit"
                    class="inline-flex items-center justify-center w-1/2 px-4 py-3 text-sm font-medium text-center text-white transition duration-150 ease-in-out bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-700 sm:w-auto">
                    Add product
                </button>
                <a href="{{ route('dashboard.admin.products.list') }}">
                    <button type="button"
                        class="inline-flex items-center justify-center w-1/2 px-4 py-3 text-sm font-medium text-center transition duration-150 ease-in-out bg-transparent border rounded-lg text-primary border-primary hover:bg-primary focus:ring-4 focus:ring-primary sm:w-auto hover:text-white">
                        Cancel
                    </button>
                </a>
            </div>
        </form>
    </div>
</div>
