<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

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

    <!-- To be used during development only -->
{{--    @if (App::environment(['local', 'staging']))--}}
{{--    <script src="https://cdn.jsdelivr.net/gh/kevinbatdorf/alpine-inline-devtools@0.12.x/dist/Default.js"></script>--}}
{{--    @endif--}}

</head>
<body class="font-sans antialiased bg-gray-100 text-gray-800">
    <div class="relative flex min-h-screen w-full">
        <div class="flex-none transition-all lg:w-64" x-data="sidebar()"
            :class="[isSidebarVisible ? 'w-64' : 'w-0']">
            <x-dashboard.sidebar/>
        </div>
        <div class="flex-1">
            <x-dashboard.header/>
            <div class="mt-16">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
