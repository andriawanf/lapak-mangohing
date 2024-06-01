<x-guest-layout>
    {{-- <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}
    {{-- Form Sign Up --}}
    <div class="w-full">
        <div>
            <h2 class="text-3xl font-bold text-[#010101] leading-[110%]">
                Create an account
            </h2>
            <p class="mt-4 text-sm leading-[140%]  w-96">Let's create your account first. Just enter your details in all
                fields.</p>
        </div>
        <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <x-input-label for="name" class="block mb-2 text-sm font-medium">
                    Username<span class="text-red-500">*</span></x-input-label>
                <x-text-input type="text" name="name" id="name"
                    class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-[#d43637] block w-full p-2.5"
                    placeholder="example@gmail.com" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <div>
                <x-input-label for="email" class="block mb-2 text-sm font-medium">
                    Email<span class="text-red-500">*</span></x-input-label>
                <x-text-input type="email" name="email" id="email"
                    class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-[#d43637] block w-full p-2.5"
                    placeholder="example@gmail.com" required autofocus />
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <x-input-label for="password" class="block mb-2 text-sm font-medium">
                        Password<span class="text-red-500">*</span></x-input-label>
                    <x-text-input type="password" name="password" id="password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                        required autofocus />
                </div>
                <div>
                    <x-input-label for="password_confirmation" class="block mb-2 text-sm font-medium">
                        Confirm Password<span class="text-red-500">*</span></x-input-label>
                    <x-text-input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                        required autofocus />
                </div>
            </div>
            <x-primary-button type="submit"
                class="w-full px-5 py-3 text-base font-medium text-center text-white bg-[#d43637] rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto hover:bg-[#a52a2b] focus:bg-[#a52a2b] active:bg-[#621919] focus:ring-[#d43637] ">Create
                account</x-primary-button>
            <div class="text-sm ">
                You have an account? <a href="/login" class="hover:underline text-[#d43637]">Sign in here</a>
            </div>
        </form>
    </div>
</x-guest-layout>
