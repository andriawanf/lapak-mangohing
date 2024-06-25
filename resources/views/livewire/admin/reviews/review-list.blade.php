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
    <div class="items-end justify-between w-full lg:flex">
        <div class="flex items-start justify-between w-full mb-4 lg:mb-0">
            <h3 class="mb-4 text-xl font-bold text-tertiary">Reviews List</h3>
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
    <!-- Table -->
    <div class="grid w-full grid-cols-3 gap-4 mt-6 overflow-auto">
        {{-- New Product chart info --}}
        <livewire:statistics.new-products-stats />
        {{-- user chart info --}}
        <livewire:statistics.users-stats />
        {{-- audiences by age info --}}
        <livewire:statistics.audiences-stats />
    </div>

    {{-- garis pembatas --}}
    <div class="w-full mt-6 border-b border-gray-200"></div>

    <div class="grid w-full grid-cols-2 gap-4 px-6 mt-6">
        @foreach ($reviews as $review)
            <article>
                <div class="flex items-center mb-4">
                    <img class="w-10 h-10 rounded-full me-4" src="{{ asset('images/mang-ohing-logo.png') }}"
                        alt="">
                    <div class="font-medium text-tertiary">
                        <p>{{ $review->user->username }} <time datetime="2014-08-16 19:00"
                                class="block text-sm text-tertiary/60">Joined on August 2014</time></p>
                    </div>
                </div>
                <div class="flex items-center mb-4">
                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 22 20">
                        <path
                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 22 20">
                        <path
                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 22 20">
                        <path
                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 22 20">
                        <path
                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <svg class="w-4 h-4 text-gray-200 me-1 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 22 20">
                        <path
                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <p class="text-sm font-medium text-tertiary/60 ms-1 ">4.95</p>
                    <p class="text-sm font-medium text-tertiary/60 ms-1 ">out of</p>
                    <p class="text-sm font-medium text-tertiary/60 ms-1 ">5</p>
                </div>
                <p class="mb-2 text-tertiary/60 text-tertiary line-clamp-4">{{ $review->review }}</p>
                <a href="#"
                    class="block mb-5 text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Read
                    more</a>
            </article>
        @endforeach
    </div>
    <!-- Card Footer -->
    {{-- <div class="items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between">
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
    </div> --}}
</div>
