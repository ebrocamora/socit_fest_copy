<nav class="relative">
    <ul class="relative">
        <li class="mb-2">
            <span class="font-bold text-sm uppercase text-white">Navigation</span>
        </li>
        <li class="mb-2">
            <a href="{{ route('admin.roles.index') }}" class="flex items-center py-2 px-4 rounded-md @if(Route::is('admin.roles.index'))bg-white text-gray-800 @else text-white @endif">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z" />
                </svg>
                <span class="ml-4 font-bold">Roles</span>
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('admin.index') }}" class="flex items-center py-2 px-4 rounded-md @if(Route::is('admin.index'))bg-white text-gray-800 @else text-white @endif">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                </svg>
                <span class="ml-4 font-bold">Users</span>
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('admin.rewards.index') }}" class="flex items-center py-2 px-4 rounded-md @if(Route::is('admin.rewards.*'))bg-white text-gray-800 @else text-white @endif">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd" />
                </svg>
                <span class="ml-4 font-bold">Rewards</span>
            </a>
        </li>
    </ul>
</nav>
