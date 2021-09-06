<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700;800&display=swap">

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

    <!-- To be used during development only -->
    @if (App::environment(['local', 'staging']))
        <script src="https://cdn.jsdelivr.net/gh/kevinbatdorf/alpine-inline-devtools@0.12.x/dist/Default.js"></script>
    @endif
</head>
<body class="relative bg-white min-h-screen overflow-x-hidden" @if(Route::is('game.index'))x-data="game()" x-init="loadData()" @endif>

    @if(Auth::check())
        @if(auth()->user()->isBanned())
            <div class="sticky z-50 top-0 left-0 h-8 w-full bg-red-500 text-white py-2">
                <div class="flex items-center justify-center">
                    <span class="text-sm">Your account is banned. <a href="{{ route('account.banned') }}" class="font-bold hover:underline">Click here to know more.</a></span>
                </div>
            </div>
        @endif
    @endif

    <!-- Main Header -->
    <div class="sticky z-30 @if(Auth::check() && auth()->user()->isBanned())top-8 @else top-0 @endif left-0 h-14 w-full bg-purple-800 shadow">
        <div class="px-4 flex h-14 items-center">
            <div class="flex-none">
                <x-application-logo theme="dark"/>
            </div>
            <div class="flex-none mx-4">
                <nav class="relative">
                    <ul class="flex items-center">
                        <li>
                            <a href="{{ route('leaderboard') }}" class="block py-2 px-4 font-bold text-white hover:bg-black hover:bg-opacity-30 rounded-full" title="Go to the Leaderboard">
                                <span>Leaderboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('game.points.tracker') }}" class="block py-2 px-4 font-bold text-white hover:bg-black hover:bg-opacity-30 rounded-full" title="Go to the Leaderboard">
                                <span>Rewards Tracker</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('game.points.tracker') }}" class="block py-2 px-4 font-bold text-white hover:bg-black hover:bg-opacity-30 rounded-full" title="Go to the Leaderboard">
                                <span>Events</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="flex-1">

            </div>
            <div class="flex-none">
                <div class="relative" x-data="{ notifActive: false }">
                    <button type="button" class="text-white h-8 w-8 mx-2 rounded-full" title="Notifications" @click="notifActive = !notifActive">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    <div class="absolute top-10 right-0 w-96 bg-white rounded shadow-md overflow-x-hidden" x-show.transition="notifActive" style="display: none" @click.away="notifActive = false">
                        <section class="relative border-b">
                            <div class="flex items-center justify-between px-4 py-2">
                                <span class="block py-2 text-sm font-bold">Notifications</span>
                                <div class="flex-none">
                                    <button type="button" class="py-1 px-3 text-left rounded w-full hover:bg-purple-100 text-purple-700 focus:outline-none">
                                        <span class="text-xs">Dismiss all</span>
                                    </button>
                                </div>
                            </div>
                        </section>
                        <section class="relative border-b">
                            <div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="block py-2 px-4 text-left w-full hover:bg-purple-100 hover:text-purple-700 focus:outline-none">
                                        <span class="text-sm">Logout</span>
                                    </button>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="flex-none">
                <div class="relative" x-data="{ userMenuActive: false }">
                    <button type="button" class="text-white h-8 w-8 mx-2 rounded-full" title="User" @click="userMenuActive = !userMenuActive">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>
                    <div class="absolute top-10 right-0 w-48 bg-white rounded shadow-md overflow-x-hidden" x-show.transition="userMenuActive" @click.away="userMenuActive = false" style="display: none">
                        <section class="relative border-b">
                            <div>
                                <a href="{{ route('account.me') }}" class="block py-2 px-4 hover:bg-purple-100 hover:text-purple-700">
                                    <span class="text-sm">Profile</span>
                                </a>
                            </div>
                        </section>
                        @can('role:create|role:read|role:update|role:delete')
                        <section class="relative border-b">
                            <div>
                                <a href="{{ route('admin.dashboard.index') }}" class="block py-2 px-4 hover:bg-purple-100 hover:text-purple-700">
                                    <span class="text-sm">Admin Dashboard</span>
                                </a>
                            </div>
                        </section>
                        @endcan
                        <section class="relative border-b">
                            <div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="block py-2 px-4 text-left w-full hover:bg-purple-100 hover:text-purple-700 focus:outline-none">
                                        <span class="text-sm">Logout</span>
                                    </button>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative z-10 p-4 bg-purple-900 text-white">
        @include('game.tracker.profile')
    </div>
    <div class="font-sans text-gray-900 antialiased pb-8">
        @yield('content')
    </div>
@livewireScripts

    @if(Route::is('game.index'))
    <script>
        function game() {
            return {
                rewards: {},
                rewardsError: null,
                events: {},
                eventsError: null,
                exp: 0,
                lvl: 0,
                expLvl: 0,
                selectedReward: 0,
                loadData() {
                    this.loadRewards();
                    this.loadUserLevel();
                },
                loadRewards() {
                    axios.get('/api/rewards/all')
                        .then((res) => {
                            this.rewards = res.data.rewards;
                            console.log(this.rewards);
                        })
                        .catch((err) => {

                        })
                },
                loadUserLevel() {
                    axios.get('/api/rewards/user/experience')
                        .then((res) => {
                            if(res.data.user.level === 0) {
                                this.lvl = 100;
                            } else {
                                this.lvl = res.data.user.level * 100;
                            }
                            this.exp = res.data.user.experience_points;
                            this.expLvl = (this.exp / (this.lvl * 100)) * 100;
                            console.log(res);
                        })
                        .catch((err) => {

                        })
                },
                openClaimModal() {
                    // this.isClaimModalVisible = true;
                    Swal.fire({
                        title: 'Enter reward code',
                        showCancelButton: true,
                        confirmButtonText: 'Submit',
                        backdrop: 'rgba(124, 58, 237, .8)',
                        input: 'text',
                        inputValidator: (value) => {
                            if (!value) {
                                return 'You need to write something!'
                            }
                        },
                        showLoaderOnConfirm: true,
                        preConfirm: (reward) => {
                            return axios.post(`/api/rewards/claim/${reward}`)
                                .then((res) => {
                                    if(!res.data.reward) {
                                        if(res.data.status === 'already claimed') {
                                            return Swal.showValidationMessage(
                                                `${res.data.message}`
                                            )
                                        }
                                        return Swal.showValidationMessage(
                                            `No reward found for code&nbsp;<strong>'${reward}'</strong>`
                                        )
                                    }
                                    return res.data;
                                })
                                .catch(error => {
                                    Swal.showValidationMessage(
                                        `${error}`
                                    )
                                })
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            console.log(result);
                            this.loadData();
                            Swal.fire({
                                toast: true,
                                icon: 'success',
                                titleText: `You earned ${result.value.reward.point_count} EXP points`,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })
                        }
                    })
                },
            }
        }
    </script>
    @endif

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
