<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Policy') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .bg-stars {
            background-image: url('{{ asset('sprites/stars.png') }}');
            background-size: auto;
            background-repeat: repeat;
        }
    </style>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-[#20234B] min-h-screen overflow-x-hidden">
<x-header/>
<x-page-header>
    <section id="privacy-policy" class="font-poppins">
        <h2 class="sm:text-lg sm:leading-snug font-semibold tracking-wide uppercase text-white mb-3">Policies</h2>
        <p class="text-3xl sm:text-5xl lg:text-6xl leading-none font-extrabold text-white tracking-tight mb-8">
            @yield('title', 'Policy')
        </p>
    </section>
</x-page-header>
<div class="font-sans text-gray-900 antialiased pb-8">
    <div class="relative md:pt-8 px-8 md:px-16">
        <div class="max-w-screen-lg xl:max-w-screen-xl mx-auto transition-all">
            <section class="policy text-white">
                @yield('content')
            </section>
        </div>
    </div>
</div>

@if(session('status'))
    <script>
        notification = @json(session()->pull('status'));
        Swal.fire({
            icon: notification.type,
            title: notification.title,
            toast: notification.toast,
            showConfirmButton: false,
            height: 64,
            position: 'bottom',
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>
@endif

@php
    session()->forget('status');
@endphp
</body>
</html>
