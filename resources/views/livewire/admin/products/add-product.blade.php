<div class="w-full px-3 py-6">
    <div class="flex items-end justify-between">
        <div class="flex items-end justify-start gap-3 mb-10">
            <a href="{{ route('dashboard.admin.products.list') }}"
                class="p-3 border border-gray-200 rounded-md bg-white/50 backdrop-blur-sm hover:bg-white">
                <i data-lucide="arrow-left" class="w-4 h-4 stroke-2"></i>
            </a>
            <div>
                <p class="mb-1 text-xs font-medium text-tertiary/60">Back to product list</p>
                <h3 class="text-lg font-semibold text-tertiary">Add New Product</h3>
            </div>
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

    <form action="{{ route('dashboard.admin.products.store') }}" method="POST" enctype="multipart/form-data"
        id="product-form" class="dropzone">
        @csrf
        <div class="grid grid-cols-2 gap-6">
            <div class="space-y-6">
                {{-- Description --}}
                <div>
                    <h3 class="mb-2 text-base font-medium text-tertiary">Description</h3>
                    <div class="flex flex-col w-full gap-4 p-6 bg-white border border-gray-200 rounded-xl">
                        <div>
                            <x-input-label for="product_name" class="mb-2 text-xs text-tertiary/60">
                                Product Name <span class="text-red-500">*</span>
                            </x-input-label>
                            <x-text-input type="text" name="product_name" wire:model='product_name' id="product_name"
                                label="product_name" class="w-full text-sm" value="{{ old('product_name') }}"
                                placeholder="write your product name" />
                            @error('product_name')
                                <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-input-label for="product_description" :value="__('Descriptions')"
                                class="mb-2 text-xs text-tertiary/60" />
                            <textarea id="product_description" rows="6" name="product_description" wire:model='product_description'
                                class="block p-2.5 w-full text-sm text-tertiary bg-gray-white rounded-lg border border-gray-300 focus:ring-primary focus:border-primary font-poppins"
                                placeholder="Write your thoughts here...">{{ old('product_description') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Category --}}
                <div>
                    <h3 class="mb-2 text-base font-medium text-tertiary">Category</h3>
                    <div class="flex flex-col w-full gap-4 p-6 bg-white border border-gray-200 rounded-xl">
                        <div>
                            <x-input-label for="product_category" class="mb-2 text-xs text-tertiary/60">
                                Product Category <span class="text-red-500">*</span>
                            </x-input-label>
                            <select id="product_category" name="product_category" wire:model='product_category'
                                class="w-full text-sm border border-gray-300 rounded-md bg-gray-50 text-tertiary focus:ring-primary focus:border-primary">

                                <option value="">Chosee type</option>
                                <option value="makaroni" {{ old('product_category') == 'makaroni' ? 'selected' : '' }}>
                                    Makaroni</option>
                                <option value="keripik" {{ old('product_category') == 'keripik' ? 'selected' : '' }}>
                                    Keripik</option>
                                <option value="kerupuk" {{ old('product_category') == 'kerupuk' ? 'selected' : '' }}>
                                    Kerupuk</option>
                            </select>
                            @error('product_category')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-input-label for="product_tag" class="mb-2 text-xs text-tertiary/60">
                                Product Tags
                            </x-input-label>
                            <x-text-input type="text" name="product_tag" wire:model='product_tag' id="product_tag"
                                label="product_tag" class="w-full text-sm" value="{{ old('product_tag') }}"
                                placeholder="ex: makaroni, original, ..." />
                            @error('product_tag')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Inventory --}}
                <div>
                    <h3 class="mb-2 text-base font-medium text-tertiary">Inventory</h3>
                    <div class="flex flex-row w-full gap-4 p-6 bg-white border border-gray-200 rounded-xl">
                        <div class="w-80">
                            <x-input-label for="product_number" class="mb-2 text-xs text-tertiary/60">
                                Product Number <span class="text-red-500">*</span>
                            </x-input-label>
                            <x-text-input type="text" name="product_number" wire:model='product_number'
                                id="product_number" label="product_number" class="w-full text-sm"
                                value="{{ old('product_number') }}" placeholder="ex: MK0000" />
                            @error('product_number')
                                <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-input-label for="product_stock" class="mb-2 text-xs text-tertiary/60">
                                Product Stock <span class="text-red-500">*</span>
                            </x-input-label>
                            <x-text-input type="number" name="product_stock" wire:model='product_stock'
                                id="product_stock" label="product_stock" class="w-full text-sm" min="0"
                                value="{{ old('product_stock') }}" placeholder="100" />
                            @error('product_stock')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-6">

                {{-- Shipping & delivery --}}
                <div>
                    <h3 class="mb-2 text-base font-medium text-tertiary">Shipping & Delivery</h3>
                    <div class="flex flex-col w-full gap-4 p-6 bg-white border border-gray-200 rounded-xl">
                        <div>
                            <x-input-label for="product_weight" class="mb-2 text-xs text-tertiary/60">
                                Product Weight (kg) <span class="text-red-500">*</span>
                            </x-input-label>
                            <x-text-input type="number" name="product_weight" wire:model='product_weight'
                                id="product_weight" label="product_weight" class="w-full text-sm" placeholder="1.5"
                                value="{{ old('product_weight') }}" />
                            @error('product_weight')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="grid grid-cols-3 space-x-2">
                            <div>
                                <x-input-label for="product_length" class="mb-2 text-xs text-tertiary/60">
                                    Length (cm) <span class="text-red-500">*</span>
                                </x-input-label>
                                <x-text-input type="number" name="product_length" wire:model='product_length'
                                    id="product_length" label="product_length" class="w-full text-sm"
                                    placeholder="1.5" value="{{ old('product_length') }}" />
                                @error('product_length')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <x-input-label for="product_breadth" class="mb-2 text-xs text-tertiary/60">
                                    Breadth (cm) <span class="text-red-500">*</span>
                                </x-input-label>
                                <x-text-input type="number" name="product_breadth" wire:model='product_breadth'
                                    id="product_breadth" label="product_breadth" class="w-full text-sm"
                                    placeholder="1.5" value="{{ old('product_breadth') }}" />
                                @error('product_breadth')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <x-input-label for="product_width" class="mb-2 text-xs text-tertiary/60">
                                    Width (cm) <span class="text-red-500">*</span>
                                </x-input-label>
                                <x-text-input type="number" name="product_width" wire:model='product_width'
                                    id="product_width" label="product_width" class="w-full text-sm"
                                    placeholder="1.5" value="{{ old('product_width') }}" />
                                @error('product_width')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- pricing --}}
                <div>
                    <h3 class="mb-2 text-base font-medium text-tertiary">Pricing</h3>
                    <div class="flex flex-col w-full gap-4 p-6 bg-white border border-gray-200 rounded-xl">
                        <div>
                            <x-input-label for="product_price" class="mb-2 text-xs text-tertiary/60">
                                Product Price (IDR) <span class="text-red-500">*</span>
                            </x-input-label>
                            <x-text-input type="number" name="product_price" wire:model='product_price'
                                id="product_price" label="product_price" class="w-full text-sm"
                                value="{{ old('product_price') }}" placeholder="ex: 10000" />
                            @error('product_price')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- product images --}}
                <div>
                    <h3 class="mb-2 text-base font-medium text-tertiary">Product Images</h3>
                    <div class="flex flex-col w-full gap-2 p-6 bg-white border border-gray-200 rounded-xl">
                        <x-input-label for="product_stock" class="mb-2 text-xs text-tertiary/60">
                            Product Images <span class="text-red-500">*</span>
                        </x-input-label>
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file" class="dz-default dz-message needsclick" data-dz-message>
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-tertiary" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-tertiary"><span class="font-semibold">Click to
                                            upload</span> or drag and drop</p>
                                    <p class="text-xs text-tertiary">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>
                                </div>
                                <input id="file" type="file" class="hidden" name="product_images[]" />
                            </label>
                        </div>
                        <div class="dropzone-drag-area" id="previews">
                            <div class="hidden" id="dzPreviewContainer">
                                <div class="dz-preview dz-file-preview">
                                    <div class="dz-photo">
                                        <img class="dz-thumbnail" data-dz-thumbnail>
                                        <div class="dz-details">
                                            <div class="dz-filename"><span data-dz-name></span></div>
                                            <div class="dz-size" data-dz-size></div>
                                        </div>
                                        <div
                                            class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full dz-progress">
                                            <span class="dz-upload" data-dz-uploadprogress></span>
                                        </div>
                                        <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                        <button class="dz-delete" type="button" data-dz-remove>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                id="times">
                                                <path fill="#FFFFFF"
                                                    d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h1 id="message"></h1>

                        {{-- <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center">
                                <svg class="w-6 h-6 mb-4 text-tertiary" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-xs text-tertiary"><span class="font-semibold">Click
                                        to upload</span> or drag and drop</p>
                                <p class="text-xs text-tertiary">SVG, PNG, JPG or GIF (MAX.
                                    800x400px)
                                </p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" name="product_images[]" multiple
                                accept="image/*" value="{{ old('product_images') }}" />
                        </label>
                        <div class="grid items-center justify-start grid-cols-3 gap-2" id="image_array_preview"></div> --}}
                    </div>
                    @error('product_images')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('dashboard.admin.products.list') }}">
                        <button type="button"
                            class="inline-flex items-center justify-center w-1/2 px-4 py-3 text-sm font-medium text-center transition duration-150 ease-in-out bg-transparent border rounded-lg text-primary border-primary hover:bg-primary focus:ring-4 focus:ring-primary sm:w-auto hover:text-white">
                            Cancel
                        </button>
                    </a>
                    <button type="submit" id="formSubmit"
                        class="inline-flex items-center justify-center w-1/2 px-4 py-3 text-sm font-medium text-center text-white transition duration-150 ease-in-out bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-700 sm:w-auto">
                        <svg aria-hidden="true" role="status" class="hidden w-4 h-4 text-white me-3 animate-spin"
                            id="spinner-loading" viewBox="0 0 100 101" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="#E5E7EB" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentColor" />
                        </svg>
                        Add product
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
