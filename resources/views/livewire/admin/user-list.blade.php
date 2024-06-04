<div class="mx-3 my-6 bg-white rounded-xl">
    <div class="p-4 sm:flex items-center justify-between lg:mt-1.5">
        <div class="w-full mb-1">
            <div class="mb-4">
                <h1 class="text-xl font-semibold text-tertiary sm:text-2xl">All users</h1>
            </div>
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
                    <div class="flex pl-0 mt-3 space-x-1 sm:pl-2 sm:mt-0">
                        <a href="#"
                            class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-tertiary hover:bg-gray-100">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-tertiary hover:bg-gray-100">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-tertiary hover:bg-gray-100">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-tertiary hover:bg-gray-100">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <button type="button" data-modal-target="add-user-modal" data-modal-toggle="add-user-modal"
                        class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-red-800 focus:ring-4 focus:ring-primary sm:w-auto">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add user
                    </button>
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
    <div class="flex flex-col p-4">
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
                                    Name
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
                                            <div class="text-base font-semibold text-tertiary">{{ $user->name }}
                                            </div>
                                            <div class="text-sm font-normal text-gray-500 ">
                                                {{ $user->email }}</div>
                                        </div>
                                    </td>
                                    <td class="p-4 text-base font-medium text-tertiary whitespace-nowrap">
                                        {{ $user->roles[0]->name }}</td>
                                    <td class="p-4 text-base font-medium text-tertiary whitespace-nowrap">
                                        Bogor</td>
                                    <td class="p-4 whitespace-nowrap">
                                        @if ($user->email_verified_at)
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-green-500">Active</span>
                                        @else
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-red-500">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        <button type="button" data-modal-target="edit-user-modal"
                                            data-modal-toggle="edit-user-modal"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-red-800 focus:ring-4 focus:ring-primary"
                                            wire:click="editUser({{ $user->id }})">
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
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-red-800 focus:ring-4 focus:ring-primary"
                                            wire:click="deleteUser({{ $user->id }})">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Delete
                                    </td>
                                </tr>
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
