<x-guest-layout>
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="remember">
                <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}

    {{-- Form Sign In --}}
    <div class="w-full">
        <div>
            <h2 class="text-3xl font-bold text-[#010101] leading-[110%]">
                Sign in
            </h2>
            <p class="mt-4 text-sm leading-[140%]  w-96">Thank you for get back to <span class="text-[#d43637]">Lapak Mang
                    Ohing</span> access our the best product
                for
                you.</p>
        </div>
        <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-input-label for="email" class="block mb-2 text-sm font-medium">
                    Email<span class="text-red-500">*</span></x-input-label>
                <x-text-input type="email" name="email" id="email"
                    class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-[#d43637] block w-full p-2.5"
                    placeholder="example@gmail.com" required />
            </div>
            <div>
                <x-input-label for="password" class="block mb-2 text-sm font-medium">
                    Password<span class="text-red-500">*</span></x-input-label>
                <x-text-input type="password" name="password" id="password" placeholder="••••••••"
                    class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                    required />
            </div>
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <x-text-input id="remember" aria-describedby="remember" name="remember" type="checkbox"
                        class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 " />
                </div>
                <div class="ml-3 text-sm">
                    <x-input-label for="remember" class="font-normal">Remember me</x-input-label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="ml-auto text-sm hover:underline">Forgot
                        your
                        Password?</a>
                @endif
            </div>
            <x-primary-button type="submit"
                class="w-full px-5 py-3 text-base font-medium text-center text-white bg-[#d43637] rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto">Sign
                in</x-primary-button>
            <div class="text-sm ">
                Don't have an account? <a href="/register" class="hover:underline text-[#d43637]">Create
                    account here</a>
            </div>
        </form>
    </div>
</x-guest-layout>
