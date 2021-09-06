@if(Auth::check())
    @if(auth()->user()->isBanned())
        <div class="fixed z-50 top-0 left-0 h-8 w-full bg-red-500 text-white py-2">
            <div class="flex items-center justify-center">
                <span class="text-sm">Your account is banned. <a href="{{ route('account.banned') }}" class="font-bold hover:underline">Click here to know more.</a></span>
            </div>
        </div>
    @endif
@endif

<div class="fixed z-40 @if(Auth::check()) @if(auth()->user()->isBanned()) top-6 @endif @else top-0 @endif left-0 h-16 sm:h-24 w-full px-8 md:px-16 transition-all md:bg-[#20234B]" x-data="{ mobileNavActive: false }">
    <div class="relative flex h-full justify-between">
        <div class="z-30 flex-none flex h-full items-center">
            <a href="/" class="-ml-1.5 mr-4 flex items-center">
                <x-application-logo class="w-8 sm:w-14 h-8 sm:h-14 fill-current text-white transition-all" />
            </a>
            <nav class="relative px-4 hidden md:inline-flex">
                <ul class="flex items-center gap-2">
                    <li>
                        <a href="{{ route('about.index') }}" class="font-poppins font-bold text-white hover:bg-white hover:bg-opacity-30 rounded-full py-2 px-4 border-2 @if(Route::is('about.index'))border-white @else border-transparent @endif transition-all">
                            About SOCIT
                        </a>
                    </li>
                    <li class="relative" x-data="{ menuActive: false }">
                        <span class="font-poppins font-bold text-white hover:bg-white hover:bg-opacity-30 rounded-full py-2 px-4 cursor-pointer transition-all" @click="menuActive = !menuActive">
                            Organizations
                        </span>
                        <ul class="absolute top-12 left-0 max-h-auto w-64 p-2 rounded-md bg-white shadow" x-show.transition.origin.top.left="menuActive" style="display: none" @click.away="menuActive = false">
                            <li>
                                <a href="{{ route('about.org.gaming-genesis') }}" class="relative block font-poppins font-bold text-gray-800 hover:bg-gray-400 hover:bg-opacity-30 rounded-md py-2 px-4 @if(Route::is('about.org.gaming-genesis'))before:absolute before:top-1.5 before:left-0 before:w-2 before:h-2/3 before:max-h-[2rem] before:rounded-full before:bg-blue-500 @endif transition-all">
                                    Gaming Genesis
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('about.org.jissa') }}" class="relative block font-poppins font-bold text-gray-800 hover:bg-gray-400 hover:bg-opacity-30 rounded-md py-2 px-4 @if(Route::is('about.org.jissa'))before:absolute before:top-1.5 before:left-0 before:w-2 before:h-2/3 before:max-h-[2rem] before:rounded-full before:bg-blue-500 @endif transition-all">
                                    JISSA-APC
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('about.org.jpcs') }}" class="relative block font-poppins font-bold text-gray-800 hover:bg-gray-400 hover:bg-opacity-30 rounded-md py-2 px-4 @if(Route::is('about.org.jpcs'))before:absolute before:top-1.5 before:left-0 before:w-2 before:h-2/3 before:max-h-[2rem] before:rounded-full before:bg-blue-500 @endif transition-all">
                                    JPCS-APC
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('about.org.msc') }}" class="relative block font-poppins font-bold text-gray-800 hover:bg-gray-400 hover:bg-opacity-30 rounded-md py-2 px-4 @if(Route::is('about.org.msc'))before:absolute before:top-1.5 before:left-0 before:w-2 before:h-2/3 before:max-h-[2rem] before:rounded-full before:bg-blue-500 @endif transition-all">
                                    APC-MSC
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('leaderboard') }}" class="font-poppins font-bold text-white hover:bg-white hover:bg-opacity-30 rounded-full py-2 px-4 border-2 @if(Route::is('leaderboard'))border-white @else border-transparent @endif transition-all">
                            Leaderboard
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="flex-none max-w-xs w-64">
            @if(Auth::check())
                <div class="relative hidden md:inline-block p-2 mt-4 rounded-md transition-all" :class="{ 'max-h-[4rem]' : !dropdownActive, 'max-h-[500px] bg-white shadow' : dropdownActive }" x-data="{ dropdownActive: false }" x-cloak>
                    <div class="relative group flex items-center h-12 p-2 rounded-md transition cursor-pointer select-none" :class="{ 'hover:bg-gray-200' : !dropdownActive }" @click="dropdownActive = !dropdownActive" x-cloak>
                        <div class="flex-none">
                            @if(auth()->user()->profile_photo_path)
                                <img src="{{ 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( auth()->user()->email ) ) ) . '&s=64'}}" class="rounded-full h-8 w-8 bg-purple-200 ring-4 transition-all" :class="{ 'ring-4 ring-purple-400' : dropdownActive, 'ring-2 ring-white' : !dropdownActive }" x-cloak/>
                            @else
                                <img src="{{ asset('images/default.gif') }}" class="rounded-full h-8 w-8 bg-purple-200 transition-all" :class="{ 'ring-4 ring-purple-400' : dropdownActive, 'ring-2 ring-white' : !dropdownActive }" x-cloak/>
                            @endif
                        </div>
                        <div class="flex-1 pl-3 overflow-x-hidden">
                            <span class="block text-lg font-bold truncate" :class="{ 'text-white group-hover:text-gray-800' : !dropdownActive, 'text-gray-800' : dropdownActive }">{{ auth()->user()->username }}</span>
                        </div>
                        <div class="flex-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" :class="{ 'text-white group-hover:text-gray-800' : !dropdownActive, 'text-gray-800' : dropdownActive }">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div class="relative" x-show.transition="dropdownActive" @click.away="dropdownActive = false" style="display: none;">
                        <div class="relative px-2 pt-2">
                            <span class="text-gray-500 uppercase text-xs font-bold">Account</span>
                        </div>
                        <ul class="mt-2">
                            <li>
                                <a href="{{ route('account.me') }}" class="flex items-center p-2 rounded-md hover:bg-gray-200 mt-2">
                                    <span class="h-8 w-8 flex items-center justify-center text-gray-800 bg-gray-300 ring-2 ring-gray-300 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                    <span class="ml-3 font-bold">Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('account.tracker') }}" class="flex items-center p-2 rounded-md hover:bg-gray-200 mt-2">
                                    <span class="h-8 w-8 flex items-center justify-center text-gray-800 bg-gray-300 ring-2 ring-gray-300 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                    <span class="ml-3 font-bold">Points Tracker</span>
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @method('POST')
                                    @csrf
                                    <button class="flex items-center p-2 w-full rounded-md hover:bg-gray-200 mt-2 cursor-pointer">
                                        <span class="h-8 w-8 flex items-center justify-center text-gray-800 bg-gray-300 ring-2 ring-gray-300 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                              <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <span class="ml-3 font-bold">Logout</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                        @hasanyrole('admin|super-admin')
                        <div class="relative px-2 pt-2">
                            <span class="text-gray-500 uppercase text-xs font-bold">Admin</span>
                        </div>
                        <ul class="mt-2">
                            @can('role:create','role:read','role:update','role:delete')
                            <li>
                                <a href="{{ url('/admin/dashboard') }}" class="flex items-center p-2 rounded-md hover:bg-gray-200 mt-2">
                                    <span class="h-8 w-8 flex items-center justify-center text-gray-800 bg-gray-300 ring-2 ring-gray-300 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                    <span class="ml-3 font-bold">Dashboard</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                        @endrole
                    </div>
                </div>
            @else
                <div class="flex items-center justify-end h-full gap-2">
                    <a href="{{ route('login') }}" class="font-poppins font-bold text-white hover:bg-white hover:bg-opacity-30 rounded-full py-2 px-4 transition-all">
                        Log in
                    </a>

                    <a href="{{ route('register') }}" class="font-poppins font-bold text-white hover:bg-white hover:bg-opacity-30 rounded-full py-2 px-4 transition-all">
                        Register
                    </a>
                </div>
            @endif
            <div class="relative flex items-center justify-end z-10 md:hidden h-full" @click.away="mobileNavActive = false">
                <button type="button" @click="mobileNavActive = !mobileNavActive" class="relative z-10 text-white p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                    </svg>
                </button>
                <nav class="fixed top-0 md:top-0 left-0 w-full h-full pt-16 sm:pt-24 transition-all ease-in overflow-y-auto" x-show.transition="mobileNavActive" :class="{ 'bg-[#141630] max-h-screen' : mobileNavActive, 'bg-[#20234B] max-h-[0px] overflow-y-hidden' : !mobileNavActive }" style="display: none">
                    <nav class="relative px-4 py-4 max-w-screen-lg xl:max-w-screen-xl mx-auto px-8 md:px-16 transition-all">
                        <ul class="flex flex-col gap-2 w-full -ml-4">
                            <li class="mb-4">
                                <a href="{{ route('about.index') }}" class="font-poppins font-bold text-xl text-white hover:bg-white hover:bg-opacity-30 rounded-full py-2 px-4 border-2 @if(Route::is('about.index'))border-white @else border-transparent @endif transition-all">
                                    About SOCIT
                                </a>
                            </li>
                            <li class="relative mb-4">
                                <div class="relative" x-data="{ subMenuActive: @if(Route::is('about.*'))true @else false @endif }">
                                    <div class="flex items-center justify-between text-white cursor-pointer" @click="subMenuActive = !subMenuActive">
                                        <span class="font-poppins font-bold text-xl text-white rounded-full py-2 px-4 transition-all">
                                            Organizations
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                    <ul class="relative ml-4 h-full w-64 text-white w-full overflow-hidden" x-show="subMenuActive"
                                        x-transition:enter="transition ease-in-out duration-500"
                                        x-transition:enter-start="opacity-0 max-h-[0px] mt-0"
                                        x-transition:enter-end="opacity-100 max-h-auto"
                                        x-transition:leave="transition ease-in-out duration-500"
                                        x-transition:leave-start="opacity-100 max-h-auto"
                                        x-transition:leave-end="opacity-0 max-h-[0px] mt-0">
                                        <li class="mb-4">
                                            <a href="{{ route('about.org.gaming-genesis') }}" class="relative block font-poppins font-bold text-xl text-white hover:bg-gray-400 hover:bg-opacity-30 rounded-md py-2 px-4 @if(Route::is('about.gaming-genesis'))before:absolute before:top-1.5 before:left-0 before:w-2 before:h-2/3 before:max-h-[2rem] before:rounded-full before:bg-blue-500 @endif transition-all">
                                                Gaming Genesis
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="{{ route('about.org.jissa') }}" class="relative block font-poppins font-bold text-xl text-white hover:bg-gray-400 hover:bg-opacity-30 rounded-md py-2 px-4 @if(Route::is('about.jissa'))before:absolute before:top-1.5 before:left-0 before:w-2 before:h-2/3 before:max-h-[2rem] before:rounded-full before:bg-blue-500 @endif transition-all">
                                                JISSA-APC
                                            </a>
                                        </li>
                                        <li class="mb-4">
                                            <a href="{{ route('about.org.jpcs') }}" class="relative block font-poppins font-bold text-xl text-white hover:bg-gray-400 hover:bg-opacity-30 rounded-md py-2 px-4 @if(Route::is('about.jpcs'))before:absolute before:top-1.5 before:left-0 before:w-2 before:h-2/3 before:max-h-[2rem] before:rounded-full before:bg-blue-500 @endif transition-all">
                                                JPCS-APC
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('about.org.msc') }}" class="relative block font-poppins font-bold text-xl text-white hover:bg-gray-400 hover:bg-opacity-30 rounded-md py-2 px-4 @if(Route::is('about.msc'))before:absolute before:top-1.5 before:left-0 before:w-2 before:h-2/3 before:max-h-[2rem] before:rounded-full before:bg-blue-500 @endif transition-all">
                                                APC-MSC
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="mb-4">
                                <a href="{{ route('leaderboard') }}" class="font-poppins font-bold text-xl text-white hover:bg-white hover:bg-opacity-30 rounded-full py-2 px-4 border-2 @if(Route::is('leaderboard'))border-white @else border-transparent @endif transition-all">
                                    Leaderboard
                                </a>
                            </li>
                        </ul>
                    </nav>
                </nav>
            </div>
        </div>
    </div>
</div>
