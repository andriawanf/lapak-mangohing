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
    <div class="items-center justify-between sm:flex">
        <div class="flex items-start justify-between w-full">
            <h1 class="text-xl font-semibold text-tertiary sm:text-2xl">Users List</h1>
            <div class="sm:flex">
                <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 ">
                    <form class="lg:pr-3" action="#" method="GET">
                        <label for="users-search" class="sr-only">Search</label>
                        <div class="relative mt-1 lg:w-64 xl:w-96">
                            <input type="text" name="email" id="users-search"
                                class="bg-gray-50 border border-gray-300 text-tertiary sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="Search for users">
                        </div>
                    </form>
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
        </div>
    </div>
    <div class="flex flex-col mt-6">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                        <thead class="bg-gray-100 ">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase ">
                                    Users
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase ">
                                    Role
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase ">
                                    Address
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase ">
                                    Status
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase ">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-100 ">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox" aria-describedby="checkbox-1" type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary">
                                            <label for="checkbox" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                                        <img class="w-10 h-10 rounded-full" src="/images/mang-ohing-logo.png"
                                            alt="avatar">
                                        <div class="text-sm font-normal text-gray-500 ">
                                            <div class="text-sm font-semibold text-tertiary">{{ $user->username }}
                                            </div>
                                            <div class="text-xs font-normal text-gray-500 ">
                                                {{ $user->email }}</div>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm font-medium text-tertiary whitespace-nowrap">
                                        {{ $user->roles[0]->name }}</td>
                                    <td
                                        class="max-w-xs p-4 text-sm font-medium truncate text-tertiary whitespace-nowrap xl:max-w-xs">
                                        Perumahan Villa Bogor Indah 5, Cluster Merak Blok CF4 No.12, Bogor, 16123</td>
                                    <td class="p-4 whitespace-nowrap">
                                        @if ($user->is_active)
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-green-500">Active</span>
                                        @else
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-red-500">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        <button type="button" data-modal-target="update-user-{{ $user->id }}"
                                            data-modal-toggle="update-user-{{ $user->id }}"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-0 focus:ring-orange-500">
                                            <i data-lucide="pencil" class="w-4 h-4"></i>
                                        </button>
                                        <button data-modal-target="delete-user-{{ $user->id }}"
                                            data-modal-toggle="delete-user-{{ $user->id }}"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-red-800 focus:ring-0 focus:ring-primary">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                        <x-modal-popup :id="'delete-user-' . $user->id" :route="route('dashboard.admin.users.destroy', $user->id)" :title="$user->username . ' ?'" />
                                    </td>
                                </tr>
                                {{-- modal create user --}}
                                <div id="update-user-{{ $user->id }}" tabindex="-1" aria-hidden="true"
                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full p-4">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                                                <h3 class="text-lg font-semibold text-gray-900 ">
                                                    Update User
                                                </h3>
                                                <button type="button"
                                                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto"
                                                    data-modal-toggle="update-user-{{ $user->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form action="{{ route('dashboard.admin.users.update', $user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="grid grid-cols-2 gap-4 p-5">
                                                    <div class="col-span-2">
                                                        <x-input-label for="role"
                                                            class="block mb-2 text-xs text-tertiary/60">
                                                            Role <span class="text-red-500">*</span>
                                                        </x-input-label>
                                                        <select id="role"
                                                            class="w-full text-sm  border border-gray-300 focus:border-[#d43637] focus:ring-[#d43637] rounded-md shadow-sm"
                                                            name="role">
                                                            <option value="admin"
                                                                {{ $user->roles[0]->name == 'admin' ? 'selected' : '' }}>
                                                                Admin</option>
                                                            <option value="customer"
                                                                {{ $user->roles[0]->name == 'customer' ? 'selected' : '' }}>
                                                                Customer</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-span-2">
                                                        <x-input-label for="is_active"
                                                            class="block mb-2 text-xs text-tertiary/60">
                                                            Active
                                                        </x-input-label>
                                                        <select id="is_active"
                                                            class="w-full text-sm  border border-gray-300 focus:border-[#d43637] focus:ring-[#d43637] rounded-md shadow-sm"
                                                            name="is_active">
                                                            <option value="">Select status</option>
                                                            <option value="0"
                                                                {{ $user->is_active == 0 ? 'selected' : '' }}>Inactive
                                                            </option>
                                                            <option value="1"
                                                                {{ $user->is_active == 1 ? 'selected' : '' }}>Active
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit"
                                                    class="inline-flex items-center px-5 py-2 mb-5 ml-5 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-red-800 focus:ring-0 focus:outline-none focus:ring-red-300">
                                                    Update User
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="items-center w-full p-4 sm:flex sm:justify-between">
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
