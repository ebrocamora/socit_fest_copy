<x-about-layout>
    <x-page-header>
        <section id="profile-main" class="font-poppins">
            <div class="relative flex flex-col md:flex-row mb-8">
                <div class="flex-1 flex flex-col md:flex-row items-center justify-center mb-4 md:mb-0">
                    <div class="flex-none mb-4 md:mb-0 md:mr-8">
                        @if(auth()->user()->profile_photo_path)
                            <img src="{{ 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( auth()->user()->email ) ) ) . '&s=120'}}" class="rounded-full border-4 border-white h-32 w-32 bg-purple-200"/>
                        @else
                            <img src="{{ asset('images/default.gif') }}" class="rounded-full border-4 border-white h-32 w-32"/>
                        @endif
                    </div>
                    <div class="flex-1 flex flex-col items-center md:items-start">
                        <h1 class="text-3xl sm:text-5xl lg:text-6xl leading-none font-extrabold text-white tracking-tight">
                            {{ $user->first_name . ' ' . $user->last_name }}
                        </h1>
                        <p class="text-2xl mb-2">a.k.a. <em>{{ $user->username }}</em></p>
                        <div class="flex items-center">
                            @foreach(auth()->user()->roles->pluck('name') as $role)
                                <span class="inline-block py-1 px-2 font-bold bg-purple-400 rounded text-sm mr-2 capitalize">{{ $role }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="flex-none flex justify-center md:block">
                    <a href="{{ route('account.settings') }}" class="py-2 px-4 block bg-white text-gray-800 hover:bg-gray-200 font-poppins font-bold rounded-md shadow focus:ring-2 focus:ring-purple-400 transition" title="Update Profile">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        <span class="ml-2 inline-block">Update Profile</span>
                    </a>
                </div>
            </div>
        </section>
    </x-page-header>
    <div class="relative pt-8 px-8 md:px-16">
        <div class="max-w-screen-lg xl:max-w-screen-xl mx-auto transition-all">
            <section id="activity-history" class="relative mb-4">
                <div class="relative mb-4">
                    <p class="text-2xl font-poppins font-bold text-white">Recent activities</p>
                </div>
                <livewire:activity-history />
            </section>
        </div>
    </div>
</x-about-layout>
