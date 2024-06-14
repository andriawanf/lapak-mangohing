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
            <h3 class="mb-4 text-xl font-bold text-tertiary">Discount List</h3>
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
            <button type="button" data-modal-target="addDiscountModal" data-modal-toggle="addDiscountModal"
                class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-red-800 focus:ring-4 focus:ring-primary sm:w-auto">
                <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd"></path>
                </svg>
                Create Discount
            </button>
            {{-- modal --}}
            @php
                $idModal = 'addDiscountModal';
            @endphp
            <x-modal-discount :id="$idModal" :discounts="$discounts" :products="$products" />
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
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Start Date
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    End Date
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Product Names
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Prices
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Discounts
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Minimum Orders
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white text-tertiary">
                            @if ($discounts->count() > 0)
                                @foreach ($discounts as $discount)
                                    <tr>
                                        <td class="p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-{{ $discount->id }}" aria-describedby="checkbox-1"
                                                    type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary">
                                                <label for="checkbox-{{ $discount->id }}"
                                                    class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                            {{ $discount->start_date }}
                                        </td>
                                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                            {{ $discount->end_date }}
                                        </td>
                                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                            {{ $discount->product->product_name }}
                                        </td>
                                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                            Rp.
                                            {{ number_format($discount->product->product_price, 0, ',', '.') }}
                                        </td>
                                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                            {{ $discount->discount_percentage }}%
                                        </td>
                                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                            Rp. {{ number_format($discount->minimum_order, 0, ',', '.') }}
                                        </td>
                                        <td class="flex flex-wrap gap-1 p-4">
                                            <div>
                                                <button type="button"
                                                    data-modal-target="editDiscountModal-{{ $discount->discount_id }}"
                                                    data-modal-toggle="editDiscountModal-{{ $discount->discount_id }}"
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-0 focus:ring-orange-500">
                                                    <i data-lucide="pencil" class="w-4 h-4"></i>
                                                </button>
                                                <x-modal-discount :id="$discount->discount_id" :discounts="$discount"
                                                    :products="$products" />
                                            </div>
                                            <form
                                                action="{{ route('dashboard.admin.products.discount.destroy', $discount->discount_id) }}"
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
            <span class="text-sm font-normal text-gray-500">Showing <span
                    class="font-semibold text-tertiary ">1-20</span> of <span
                    class="font-semibold text-tertiary ">2290</span></span>
        </div>
        <div class="flex items-center space-x-3">
            <ol class="flex justify-center gap-1 text-xs font-medium">
                <li>
                    <a href="#"
                        class="inline-flex items-center justify-center bg-white border border-gray-100 rounded text-tertiary hover:bg-gray-200 size-8 rtl:rotate-180">
                        <span class="sr-only">Prev Page</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="block leading-8 text-center bg-white border border-gray-100 rounded text-tertiary hover:bg-gray-200 size-8">
                        1
                    </a>
                </li>

                <li class="block leading-8 text-center text-white rounded bg-primary border-primary size-8">
                    2
                </li>

                <li>
                    <a href="#"
                        class="block leading-8 text-center bg-white border border-gray-100 rounded text-tertiary hover:bg-gray-200 size-8">
                        3
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="block leading-8 text-center bg-white border border-gray-100 rounded text-tertiary hover:bg-gray-200 size-8">
                        4
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="block leading-8 text-center bg-white border border-gray-100 rounded text-tertiary hover:bg-gray-200 size-8">
                        ...
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="block leading-8 text-center bg-white border border-gray-100 rounded text-tertiary hover:bg-gray-200 size-8">
                        7
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="inline-flex items-center justify-center bg-white border border-gray-100 rounded text-tertiary hover:bg-gray-200 size-8 rtl:rotate-180">
                        <span class="sr-only">Next Page</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
            </ol>
        </div>
    </div>
</div>
