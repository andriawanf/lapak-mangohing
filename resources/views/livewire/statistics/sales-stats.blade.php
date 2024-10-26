<div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 sm:p-6">
    <div class="flex items-center justify-between mb-4">
        <div class="flex-shrink-0">
            <span class="text-xl font-bold leading-none text-tertiary sm:text-2xl">$45,385</span>
            <h3 class="text-base font-light text-tertiary">Sales this week
            </h3>
        </div>
        <div class="flex items-center justify-end flex-1 text-base font-medium text-green-500">
            12.5%
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
        </div>
    </div>
    <div id="main-chart"></div>
    <!-- Card Footer -->
    <div class="flex items-center justify-between pt-3 mt-4 border-t border-[#bbbbbd] sm:pt-6">
        <div>
            <button
                class="inline-flex items-center p-2 text-sm font-medium text-center text-[#bbbbbd] rounded-lg hover:text-tertiary"
                type="button" data-dropdown-toggle="weekly-sales-dropdown">Last 7 days <svg class="w-4 h-4 ml-2"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow"
                id="weekly-sales-dropdown">
                <div class="px-4 py-3" role="none">
                    <p class="text-sm font-medium truncate text-tertiary " role="none">
                        Sep 16, 2021 - Sep 22, 2021
                    </p>
                </div>
                <ul class="py-1" role="none">
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-[#bbbbbd] hover:bg-gray-100"
                            role="menuitem">Yesterday</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-[#bbbbbd] hover:bg-gray-100 "
                            role="menuitem">Today</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-[#bbbbbd] hover:bg-gray-100 "
                            role="menuitem">Last 7 days</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-[#bbbbbd] hover:bg-gray-100 "
                            role="menuitem">Last 30 days</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-[#bbbbbd] hover:bg-gray-100 "
                            role="menuitem">Last 90 days</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex-shrink-0">
            <a href="#"
                class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-tertiary sm:text-sm hover:bg-primary hover:text-white">
                Sales Report
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</div>
