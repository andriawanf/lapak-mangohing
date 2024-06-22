<div class="p-3 mx-3 my-6 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6">
    @if (session()->has('success'))
        <div id="toast-success"
            class="absolute flex items-center justify-center p-4 mb-4 text-gray-500 bg-white rounded-lg shadow right-3 top-20 w-fit"
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
    <!-- Card header -->
    <div class="items-end justify-between lg:flex">
        <div class="mb-4 lg:mb-0">
            <h3 class="mb-4 text-xl font-bold text-tertiary">Products List</h3>
            <div class="flex items-center gap-4">
                <form action="#" method="GET" class="hidden lg:block ">
                    <label for="topbar-search" class="sr-only">Search</label>
                    <div class="relative lg:w-72">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" name="email" id="topbar-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full pl-10 p-2.5 "
                            placeholder="Search">
                    </div>
                </form>
                <div class="flex items-center">
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown"
                        class="mb-4 sm:mb-0 inline-flex items-center text-tertiary bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2.5"
                        type="button">
                        Filter by status
                        <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                        <h6 class="mb-3 text-sm font-medium text-gray-900 ">
                            Category
                        </h6>
                        <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                            <li class="flex items-center">
                                <input id="apple" type="checkbox" value=""
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                                <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Completed (56)
                                </label>
                            </li>

                            <li class="flex items-center">
                                <input id="fitbit" type="checkbox" value="" checked
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                                <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Cancelled (56)
                                </label>
                            </li>

                            <li class="flex items-center">
                                <input id="dell" type="checkbox" value=""
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                                <label for="dell" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    In progress (56)
                                </label>
                            </li>

                            <li class="flex items-center">
                                <input id="asus" type="checkbox" value="" checked
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                                <label for="asus" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    In review (97)
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
            <a href="{{ route('dashboard.admin.products.add') }}">
                <button type="button"
                    class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-red-800 focus:ring-4 focus:ring-primary sm:w-auto">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Create Product
                </button>
            </a>
            <a href="#"
                class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center bg-white border border-gray-300 rounded-lg text-tertiary hover:bg-gray-100 focus:ring-4 focus:ring-primary sm:w-auto">
                <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                        clip-rule="evenodd"></path>
                </svg>
                Export
            </a>
        </div>
    </div>
    <!-- Table -->
    <div class="flex flex-col mt-6 overflow-auto">
        <div class="overflow-x-auto rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 table-auto">
                        <thead class="bg-primary/10">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-semibold tracking-wider text-left uppercase text-tertiary">
                                    Product
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-semibold tracking-wider text-left uppercase text-tertiary">
                                    Product description
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-semibold tracking-wider text-left uppercase text-tertiary">
                                    product number
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-semibold tracking-wider text-left uppercase text-tertiary">
                                    Product price
                                </th>
                                {{-- <th scope="col"
                                    class="p-4 text-xs font-semibold tracking-wider text-left uppercase text-tertiary">
                                    Discount
                                </th> --}}
                                <th scope="col"
                                    class="p-4 text-xs font-semibold tracking-wider text-left uppercase text-tertiary">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white text-tertiary">
                            @if (count($data_products) > 0)
                                @foreach ($data_products['data'] as $product)
                                    <tr>
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox{{ $product['id'] }}" aria-describedby="checkbox-1"
                                                    type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary">
                                                <label for="checkbox" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="flex items-center gap-4 p-4">
                                            <img src="{{ $product['images'] ? asset('storage/images/products/' . $product['images'][0]['url']) : asset('/storage/images/products/default-product.png') }}"
                                                width="56" height="56" alt="product-image"
                                                class="object-cover rounded-lg" loading="lazy">
                                            <div class="text-sm font-semibold text-gray-900 whitespace-nowrap ">
                                                {{ $product['product_name'] }}
                                                <p class="text-xs font-normal text-tertiary/50">Tag:
                                                    {{ $product['product_tag'] }}
                                                </p>
                                            </div>
                                        </td>
                                        <td
                                            class="max-w-sm p-4 overflow-hidden text-sm font-normal truncate text-tertiary/80 xl:max-w-xs ">
                                            {{ $product['product_description'] }}
                                        </td>
                                        <td class="p-4 text-sm font-semibold text-tertiary whitespace-nowrap ">
                                            #{{ $product['product_number'] }}
                                        </td>
                                        <td class="p-4 text-sm font-semibold text-tertiary whitespace-nowrap ">
                                            Rp. {{ number_format($product['product_price'], 0, ',', '.') }}
                                        </td>
                                        {{-- <td class="p-4 text-sm font-semibold text-tertiary whitespace-nowrap ">
                                            {{ $product->discount_percentage }}%
                                        </td> --}}
                                        <td class="flex flex-wrap gap-1 p-4">
                                            <button type="button"
                                                data-modal-target="detail-modal-product{{ $product['id'] }}"
                                                data-modal-toggle="detail-modal-product{{ $product['id'] }}"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-0 focus:ring-blue-700">
                                                <i data-lucide="receipt-text" class="w-4 h-4"></i>
                                            </button>
                                            <a href="{{ route('dashboard.admin.products.edit', $product['id']) }}">
                                                <button type="button"
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-0 focus:ring-orange-500">
                                                    <i data-lucide="pencil" class="w-4 h-4"></i>
                                                </button>
                                            </a>
                                            <form
                                                action="{{ route('dashboard.admin.products.destroy', $product['id']) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-red-800 focus:ring-0 focus:ring-primary">
                                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <x-modal :id="$product['id']" :data="$product" />
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="p-4 text-center">No data found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Footer -->
    <div class="items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between">
        <div class="flex items-center mb-4 sm:mb-0">
            <span class="text-sm font-normal text-gray-500">
                Showing <span
                    class="font-semibold text-tertiary">{{ $data_products['meta']['from'] }}-{{ $data_products['meta']['to'] }}</span>
                of <span class="font-semibold text-tertiary">{{ $data_products['meta']['total'] }}</span>
            </span>
        </div>
        <div class="flex items-center space-x-3">
            <ol class="flex justify-center gap-1 text-xs font-medium">
                @foreach ($data_products['meta']['links'] as $link)
                    @if ($link['url'])
                        <li>
                            <a href="{{ route('dashboard.admin.products.list', ['page' => $link['url'] ? $link['label'] : null]) }}"
                                class="flex items-center justify-center  px-3 py-2 {{ $link['active'] ? 'bg-primary border border-gray-100 rounded text-white hover:bg-red-800' : 'bg-white border border-gray-100 rounded text-tertiary hover:bg-gray-200' }}">
                                {!! $link['label'] !!}
                            </a>
                        </li>
                    @else
                        <li>
                            <span
                                class="inline-flex items-center justify-center px-3 py-2 bg-white border border-gray-100 rounded text-tertiary">
                                {!! $link['label'] !!}
                            </span>
                        </li>
                    @endif
                @endforeach
            </ol>
        </div>
    </div>
</div>
