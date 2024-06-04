<div class="p-3 mx-3 my-6 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6">
    <!-- Card header -->
    <div class="items-end justify-between lg:flex">
        <div class="mb-4 lg:mb-0">
            <h3 class="mb-4 text-xl font-bold text-tertiary">All products</h3>
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
                    Add user
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
                                    Product image
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-semibold tracking-wider text-left uppercase text-tertiary">
                                    Product name
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
                                <th scope="col"
                                    class="p-4 text-xs font-semibold tracking-wider text-left uppercase text-tertiary">
                                    Discount
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-semibold tracking-wider text-left uppercase text-tertiary">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white text-tertiary">
                            <tr>
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox" aria-describedby="checkbox-1" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary">
                                        <label for="checkbox" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap ">
                                    <div class="w-full rounded-lg">
                                        <img src="/images/mang-ohing-logo.png" width="56" height="56"
                                            alt="product-image" class="object-cover">
                                    </div>
                                </td>
                                <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap ">
                                    Makaroni Pedas
                                </td>
                                <td
                                    class="max-w-sm p-4 overflow-hidden text-sm font-normal text-gray-500 truncate xl:max-w-xs ">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas porro dolorum
                                    praesentium et illo maiores soluta quam deserunt in quisquam.
                                </td>
                                <td class="p-4 text-sm font-semibold text-tertiary whitespace-nowrap ">
                                    #193650173
                                </td>
                                <td class="p-4 text-sm font-semibold text-tertiary whitespace-nowrap ">
                                    Rp. 15.000
                                </td>
                                <td class="p-4 text-sm font-semibold text-tertiary whitespace-nowrap ">
                                    10%
                                </td>
                                <td class="p-4 space-x-2 whitespace-nowrap">
                                    <button type="button" data-modal-target="edit-user-modal"
                                        data-modal-toggle="edit-user-modal"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-red-800 focus:ring-4 focus:ring-primary">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Edit
                                    </button>
                                    <button type="button" data-modal-target="delete-user-modal"
                                        data-modal-toggle="delete-user-modal"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-red-800 focus:ring-4 focus:ring-primary">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Delete
                                    </button>
                                </td>
                            </tr>
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
