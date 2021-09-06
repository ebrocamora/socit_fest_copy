<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Account banned - {{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;600;700;800&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="relative min-h-screen flex flex-col items-center justify-center py-4">
        <header class="relative h-16 bg-gray-50">
            <div class="relative px-8 md:px-16">
                <div class="max-w-screen-lg xl:max-w-screen-xl mx-auto transition-all">
                    <div class="flex h-16 py-4 items-center justify-center">
                        <img src="{{ asset('sprites/socit_logo.png') }}" class="h-8 w-auto"/>
                        <div class="ml-4 flex flex-col font-poppins leading-none text-purple-500 select-none">
                            <span class="block text-lg font-bold -mb-3">SOCIT</span>
                            <span class="block text-lg font-bold">FEST</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="mt-4 pt-4">
            <div class="relative px-8 md:px-16">
                <div class="max-w-xl mx-auto transition-all">
                    <div class="flex flex-col items-center justify-center">
                        <div class="relative">
                            <img src="{{ asset('sprites/banned.svg') }}" class="h-32 w-auto"/>
                        </div>
                        <div class="relative my-4 text-center text-gray-500">
                            <h1 class="text-2xl font-bold font-poppins py-4 text-purple-500">
                                Your account is banned.
                            </h1>
                            <p class="pt-2">
                                We have received reports that you didn't follow our <a href="{{ route('policy.terms') }}" class="text-purple-500 font-bold hover:underline">Terms and Conditions</a>. <br/>
                                If you think that your account was mistakenly banned, you may contact <a href="mailto:cmdinglasan@student.apc.edu.ph" class="text-purple-500 font-bold hover:underline">Christian Dinglasan</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
