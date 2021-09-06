<x-guest-layout title="">
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <x-slot name="header">
            <div class="relative pt-4 mt-2 text-center">
                <h1 class="font-poppins text-3xl font-extrabold">
                    Create an account
                </h1>
                <p class="text-gray-500 text-sm py-2">
                    Or <a href="{{ route('login') }}" class="text-purple-500">log in to your account</a>
                </p>
            </div>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="relative" x-data="formData()" x-init="init">

                <div class="relative" x-show="screen === 1"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform scale-90"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-90">
                    <!-- First Name -->
                    <div>
                        <x-label for="first_name" :value="__('First Name')" />
                        <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" placeholder="Enter your first name" required autofocus x-ref="first_name"/>
                        @if($errors->has('first_name'))
                            <span class="text-red-500 text-xs">{{ $errors->first('first_name') }}</span>
                        @endif
                    </div>

                    <!-- Middle Name -->
                    <div class="mt-4">
                        <x-label for="middle_name" :value="__('Middle Name')" />
                        <x-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" :value="old('middle_name')" placeholder="Enter your middle name" required x-ref="middle_name" />
                        @if($errors->has('middle_name'))
                            <span class="text-red-500 text-xs">{{ $errors->first('middle_name') }}</span>
                        @endif
                    </div>

                    <!-- Last Name -->
                    <div class="mt-4">
                        <x-label for="last_name" :value="__('Last Name')" />
                        <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" placeholder="Enter your last name" required x-ref="last_name" />
                        @if($errors->has('last_name'))
                            <span class="text-red-500 text-xs">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>

                    <div class="block mt-4">
                        <label for="has_referrer" class="inline-flex items-center">
                            <input id="has_referrer" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition" x-model="hasReferrer">
                            <span class="ml-2 text-sm text-gray-600">{{ __('I am referred') }}</span>
                        </label>
                    </div>

                    <!-- Referrer -->
                    <div class="mt-4" x-show="hasReferrer" x-transition style="display: none">
                        <x-label for="referrer" :value="__('Referrer')" />
                        <x-input id="referrer" class="block mt-1 w-full" type="text" name="referrer" :value="old('referrer')" placeholder="Enter your referrer's username" x-ref="referrer"/>
                        @if($errors->has('referrer'))
                        <span class="text-red-500 text-xs">{{ $errors->first('referrer') }}</span>
                        @endif
                    </div>

                    <div class="flex items-center justify-end mt-4" x-on:click="screen = 2">
                        <button type="button" class="inline-flex items-center justify-center px-4 py-3 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest bg-purple-600 hover:bg-purple-700 active:bg-gray-900 text-white focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:bg-gray-200 disabled:text-gray-300 transition ease-in-out duration-150 w-full"
                                ::disabled="!canContinue">
                            {{ __('Continue') }}
                        </button>
                    </div>
                </div>
                <div class="relative" x-show="screen === 2" x-transition style="display: none">

                    <!-- Go back -->
                    <div>
                        <button type="button" class="flex items-center py-2 px-2 -ml-2 rounded text-gray-800 hover:bg-gray-200 transition" x-on:click="screen = 1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
{{--                            <span class="text-sm font-bold ml-2">Go back</span>--}}
                        </button>
                    </div>

                    <!-- Email -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />
                        <span class="text-xs text-gray-500">Must be a valid APC or National University email</span>
                        <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" placeholder="Enter your email address" required autofocus x-ref="email" />
                        @if($errors->has('email'))
                            <span class="text-red-500 text-xs">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <!-- Username -->
                    <div class="mt-4">
                        <x-label for="username" :value="__('Username')" />
                        <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" placeholder="Enter your username" required  x-ref="username"/>
                        @if($errors->has('username'))
                            <span class="text-red-500 text-xs">{{ $errors->first('username') }}</span>
                        @endif
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />
                        <span class="text-xs text-gray-500">Must <strong>not</strong> be the same with username and email</span>

                        <x-input id="password" class="block mt-1 w-full"
                                 type="password"
                                 name="password"
                                 required autocomplete="current-password" x-ref="password"/>
                        @if($errors->has('password'))
                            <span class="text-red-500 text-xs">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password_confirm" :value="__('Confirm Password')" />

                        <x-input id="password_confirm" class="block mt-1 w-full"
                                 type="password"
                                 name="password_confirmation"
                                 required x-ref="password_confirm"/>
                    </div>

                    <div class="mt-4">
                        <button type="submit" x-on:click="isSubmitting" class="inline-flex items-center justify-center px-4 py-3 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 w-full bg-purple-600">
                            <template x-if="!isSubmitting">
                                <span>{{ __('Register') }}</span>
                            </template>
                            <template x-if="isSubmitting">
                                <div class="animate-spin">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 50 50" fill="currentColor">
                                        <path d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z"></path>
                                    </svg>
                                </div>
                            </template>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </x-auth-card>

    <script>
        function formData() {
            return {
                form: {
                    name: {
                        first: '',
                        middle: '',
                        last: '',
                    },
                    referrer: '',
                    email: '',
                    username: '',
                    password: '',
                },
                screen: 1,
                hasReferrer: false,
                isSubmitting: false,
                init() {
                    this.$watch('form', (newValue, oldValue) => {
                        this.canContinue();
                    });
                    this.canContinue();
                },
                canContinue() {
                    if(this.form.name.first !== '') {
                        return false
                    }
                    return true
                },
            }
        }
    </script>

    @if($errors->any())
        <script>
            const error = "{{ $errors->first() }}";

            Swal.fire({
                toast: true,
                position: 'top-end',
                title: error,
                // text: error,
                icon: 'error',
                padding: '.5rem 1rem .5rem 1rem',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                },
                customClass: {
                    title: 'py-0'
                }
            })
        </script>
    @endif

</x-guest-layout>
