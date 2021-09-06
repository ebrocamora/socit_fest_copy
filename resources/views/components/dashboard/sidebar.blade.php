<div class="fixed top-0 left-0 h-full w-64 bg-gray-800 overflow-x-hidden transform"
    :class="[ isSidebarVisible ? 'translate-x-0' : '-translate-x-64' ]">
    <section class="relative h-16 px-4 py-3 flex">
        <x-application-logo theme="dark" class=""/>
    </section>
    <section class="relative p-4 flex flex-col items-center">
        <div class="relative w-24 h-24">
           <img src="{{ auth()->user()->profile_photo_path ?? asset('images/default.gif') }}" alt="User avatar" class="h-24 w-24 rounded-full"/>
        </div>
        <div class="flex flex-col items-center justify-center w-full mt-6 font-poppins">
            <div class="w-full whitespace-nowrap overflow-ellipsis overflow-hidden text-center leading-normal font-medium">
                <span class="text-white text-sm">
                    {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}
                </span>
            </div>
            <div class="w-full mt-0.5 whitespace-nowrap overflow-ellipsis overflow-hidden text-center text-md leading-normal font-medium text-secondary">
                <span class="text-gray-500 text-xs">
                    {{ auth()->user()->email }}
                </span>
            </div>
        </div>
    </section>
    <section class="relative mt-4 flex flex-col select-none font-poppins">
        <div class="mx-3">
            <div class="relative flex items-center justify-start px-4 py-3 rounded">
                <div>
                    <span class="text-sm uppercase font-bold text-purple-300">
                        Dashboard
                    </span>
                </div>
            </div>
        </div>
        <div class="mx-3">
            <a href="{{ route('admin.dashboard.index') }}">
                <div class="relative flex items-center justify-start px-4 py-3 mb-0.5 rounded @if(Route::is('admin.dashboard.*')) bg-gray-600 @endif hover:bg-gray-600">
                    <div class="flex-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div class="flex-1 ml-2">
                        <span class="text-sm text-white">
                            Dashboard
                        </span>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin.roles.index') }}">
                <div class="relative flex items-center justify-start px-4 py-3 mb-0.5 rounded @if(Route::is('admin.roles.*')) bg-gray-600 @endif hover:bg-gray-600">
                    <div class="flex-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div class="flex-1 ml-2">
                        <span class="text-sm text-white">
                            Roles
                        </span>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin.users.index') }}">
                <div class="relative flex items-center justify-start px-4 py-3 mb-0.5 rounded @if(Route::is('admin.users.*')) bg-gray-600 @endif hover:bg-gray-600">
                    <div class="flex-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="flex-1 ml-2">
                        <span class="text-sm text-white">
                            Users
                        </span>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin.rewards.index') }}">
                <div class="relative flex items-center justify-start px-4 py-3 mb-0.5 rounded @if(Route::is('admin.rewards.*')) bg-gray-600 @endif hover:bg-gray-600">
                    <div class="flex-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                        </svg>
                    </div>
                    <div class="flex-1 ml-2">
                        <span class="text-sm text-white">
                            Rewards
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </section>
</div>
<div class="fixed top-0 left-0 bg-black bg-opacity-30"></div>

<script>
    function sidebar() {
        return {
            isSidebarVisible: false,
            screenSize: 0,
        }
    }
</script>
