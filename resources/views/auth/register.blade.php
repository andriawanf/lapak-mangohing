<x-guest-layout>
    {{-- Form Sign Up --}}
    <div class="flex items-center justify-center w-full min-h-screen">
        <div class="max-w-md">
            <div>
                <h2 class="text-3xl font-bold text-[#010101] leading-[110%]">
                    Create an account
                </h2>
                <p class="mt-4 text-sm leading-[140%]  w-96">Let's create your account first. Just enter your details in
                    all
                    fields.</p>
            </div>

            @if ($errors->any())
                <div class="mt-4">
                    <div class="font-medium text-red-600">Whoops! Something went wrong.</div>

                    <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <x-input-label for="username" class="block mb-2 text-sm font-medium">
                        Username<span class="text-red-500">*</span></x-input-label>
                    <x-text-input type="text" name="username" id="username"
                        class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-[#d43637] block w-full p-2.5"
                        placeholder="jhon doe" :value="old('username')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="email" class="block mb-2 text-sm font-medium">
                        Email<span class="text-red-500">*</span></x-input-label>
                    <x-text-input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-[#d43637] block w-full p-2.5"
                        placeholder="example@gmail.com" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <x-input-label for="password" class="block mb-2 text-sm font-medium">
                            Password<span class="text-red-500">*</span></x-input-label>
                        <x-text-input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                            required autofocus />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="confirm_password" class="block mb-2 text-sm font-medium">
                            Confirm Password<span class="text-red-500">*</span></x-input-label>
                        <x-text-input type="password" name="confirm_password" id="confirm_password"
                            placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                            required autofocus />
                        <x-input-error :messages="$errors->get('confirm_password')" class="mt-2" />
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
    </div>
</x-guest-layout>
