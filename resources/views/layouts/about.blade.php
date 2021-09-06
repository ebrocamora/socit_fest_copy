<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        .bg-stars {
            background-image: url('{{ asset('sprites/stars.png') }}');
            background-size: auto;
            background-repeat: repeat;
        }
    </style>
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-[#20234B] min-h-screen overflow-x-hidden">
    <x-header/>
    <div class="font-sans text-gray-900 antialiased pb-8">
        {{ $slot }}
    </div>
    @livewireScripts

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
