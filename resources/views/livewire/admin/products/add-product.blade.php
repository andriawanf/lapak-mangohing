<div class="w-full px-3 py-6">
    <div class="p-4 bg-white border border-gray-200 rounded-xl">
        <div class="mb-6">
            <h3 class="mb-2 text-xl font-bold text-tertiary">Add Product</h3>
            <span class="text-base font-normal text-gray-500">This is a form for add new product</span>
        </div>
        <form action="" method="">
            <div class="grid grid-cols-2 space-x-6">
                <div class="space-y-6">
                    {{-- input product name --}}
                    <div>
                        <x-input-label for="product_name" :value="__('Product Name')" class="mb-2" />
                        <x-text-input type="text" name="product_name" id="product_name" label="product_name"
                            class="w-full" />
                    </div>
                    {{-- input product number & product category --}}
                    <div class="grid grid-cols-2 space-x-6">
                        <div>
                            <x-input-label for="product_number" :value="__('Product Number')" class="mb-2" />
                            <x-text-input type="number" name="product_number" id="product_number"
                                label="product_number" class="w-full" />
                        </div>
                        <div>
                            <x-input-label for="product_category" :value="__('Product Category')" class="mb-2" />
                            <select id="product_category" name="product_category"
                                class="w-full text-base border border-gray-300 rounded-md bg-gray-50 text-tertiary focus:ring-primary focus:border-primary">

                                <option value="">Chosee type</option>
                                <option>Canada</option>
                                <option>France</option>
                                <option>Germany</option>
                            </select>
                        </div>
                    </div>
                    {{-- input product price & product stock --}}
                    <div class="grid grid-cols-2 space-x-6">
                        <div>
                            <x-input-label for="product_price" :value="__('Price')" class="mb-2" />
                            <x-text-input type="number" name="product_price" id="product_price" label="product_price"
                                class="w-full" />
                        </div>
                        <div>
                            <x-input-label for="product_stock" :value="__('Stocks')" class="mb-2" />
                            <x-text-input type="number" name="product_stock" id="product_stock" label="product_stock"
                                class="w-full" />
                        </div>
                    </div>
                    {{-- input product description --}}
                    <div>
                        <x-input-label for="product_description" :value="__('Descriptions')" class="mb-2" />
                        <textarea id="product_description" rows="14" name="product_description"
                            class="block p-2.5 w-full text-sm text-tertiary bg-gray-white rounded-lg border border-gray-300 focus:ring-primary focus:border-primary"
                            placeholder="Write your thoughts here..."></textarea>
                    </div>
                    {{-- input discount --}}
                    <div class="grid grid-cols-2 space-x-6">
                        <div>
                            <x-input-label for="discount_type" :value="__('Discount Type')" class="mb-2" />
                            <select id="discount_type" name="discount_type"
                                class="w-full text-base border border-gray-300 rounded-md bg-gray-50 text-tertiary focus:ring-primary focus:border-primary">

                                <option value="">Chosee type</option>
                                <option>Canada</option>
                                <option>France</option>
                                <option>Germany</option>
                            </select>
                        </div>
                        <div>
                            <x-input-label for="minim_orders" :value="__('Minimum Orders Amount')" class="mb-2" />
                            <x-text-input type="number" name="minim_orders" id="minim_orders" label="minim_orders"
                                class="w-full" placeholder="Enter minimim amount" />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 space-x-6">
                        <div>
                            <x-input-label for="discount_period-start" :value="__('Discount Peroid Start')" class="mb-2" />
                            <x-text-input type="date" name="discount_period-start" id="discount_period-start"
                                label="discount_period-start" class="w-full" placeholder="Enter discount type" />
                        </div>
                        <div>
                            <x-input-label for="discount_period_end" :value="__('Discount Peroid End')" class="mb-2" />
                            <x-text-input type="date" name="discount_period_end" id="discount_period_end"
                                label="discount_period_end" class="w-full" placeholder="Enter minimim amount" />
                        </div>
                    </div>
                </div>
                <div class="space-y-6">
                    {{-- input product tags --}}
                    <div>
                        <x-input-label for="product_tag" :value="__('Tags')" class="mb-2" />
                        <x-text-input type="text" name="product_tag" id="product_tag" label="product_tag"
                            class="w-full" />
                    </div>
                    {{-- input product weight --}}
                    <div>
                        <x-input-label for="product_weight" :value="__('Item Weight (kg)')" class="mb-2" />
                        <x-text-input type="number" name="product_weight" id="product_weight" label="product_weight"
                            class="w-full" />
                    </div>
                    {{-- input product dimension --}}
                    <div class="grid grid-cols-3 space-x-6">
                        <div>
                            <x-input-label for="product_length" :value="__('Length (cm)')" class="mb-2" />
                            <x-text-input type="number" name="product_length" id="product_length"
                                label="product_length" class="w-full" />
                        </div>
                        <div>
                            <x-input-label for="product_breadth" :value="__('Breadth (cm)')" class="mb-2" />
                            <x-text-input type="number" name="product_breadth" id="product_breadth"
                                label="product_breadth" class="w-full" />
                        </div>
                        <div>
                            <x-input-label for="product_width" :value="__('Width (cm)')" class="mb-2" />
                            <x-text-input type="number" name="product_width" id="product_width"
                                label="product_width" class="w-full" />
                        </div>
                    </div>
                    {{-- input product description --}}
                    <div>
                        <x-input-label for="product_images" :value="__('Product Images')" class="mb-2" />
                        <div class="grid grid-cols-3 gap-3">
                            <div class="relative">
                                <img id="product_image" src="/images/8.jpg" alt="product image"
                                    class="object-cover rounded-xl">
                                <i data-lucide="trash-2" class="absolute text-lg text-red-500 bottom-3 left-3"></i>
                            </div>
                            <div class="relative">
                                <img id="product_image" src="/images/8.jpg" alt="product image"
                                    class="object-cover rounded-xl">
                                <i data-lucide="trash-2" class="absolute text-lg text-red-500 bottom-3 left-3"></i>
                            </div>
                            <div class="relative">
                                <img id="product_image" src="/images/8.jpg" alt="product image"
                                    class="object-cover rounded-xl">
                                <i data-lucide="trash-2" class="absolute text-lg text-red-500 bottom-3 left-3"></i>
                            </div>
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
                                <input id="dropzone-file" type="file" class="hidden" />
                            </label>
                        </div>
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
