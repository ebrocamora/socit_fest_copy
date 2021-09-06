<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <x-slot name="header">
            <div class="relative pt-4 mt-2 text-center">
                <h1 class="font-poppins text-3xl font-extrabold">
                    Sign in to your account
                </h1>
                <p class="text-gray-500 text-sm py-2">
                    Or <a href="{{ route('register') }}" class="text-purple-500">create a new account</a>
                </p>
            </div>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
            <div>
                <x-label for="username" :value="__('Username')" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
                @if($errors->has('username'))
                    <span class="text-red-500 text-xs">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="current-password" />

                @error('email')
                    <span class="text-red-500 text-xs">{{ $errors->first('email') }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between mt-4 py-2">
                <!-- Remember Me -->
                <div class="block">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Forgot Password -->
                @if (Route::has('password.request'))
                    <a class="text-sm font-bold text-purple-600 hover:text-purple-900 transition" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="inline-flex items-center justify-center px-4 py-3 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 w-full bg-purple-600">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </x-auth-card>

</x-guest-layout>


