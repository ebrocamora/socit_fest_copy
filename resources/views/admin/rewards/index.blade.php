<x-about-layout>
    <x-page-header>
        <section class="font-poppins">
            <span class="h-16 w-16 rounded-xl bg-gradient-to-br flex items-center justify-center from-[#5e60ce] to-[#6930c3] text-white mb-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                </svg>
            </span>
            <h2 class="sm:text-lg sm:leading-snug font-semibold tracking-wide uppercase text-white mb-3">Admin</h2>
            <p class="text-3xl sm:text-5xl lg:text-6xl leading-none font-extrabold text-white tracking-tight mb-8">Rewards</p>
        </section>
    </x-page-header>
    <div class="relative pt-8 px-8 md:px-16">
        <div class="max-w-screen-lg xl:max-w-screen-xl mx-auto transition-all">
            <div class="relative flex" x-data="tabs()">
                <div class="flex-none w-64 pr-8">
                    <x-roles-sidebar/>
                </div>
                <div class="flex-1">
                    <section id="regular-rewards" class="relative mb-4">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <a href="#regular" @click="tab = 'regular'" class="flex-none text-2xl font-bold font-poppins" :class="{ 'text-white' : tab === 'regular', 'text-gray-300' :  }">
                                    <span>Regular</span>
                                </a>
                                <span class="flex-none h-full w-1 bg-white mx-4"></span>
                                <a href="#custom" @click="tab = 'custom'" class="flex-none text-2xl font-bold font-poppins" :class="{ 'text-white' : tab === 'custom', 'text-gray-300' :  }">
                                    <span>Custom</span>
                                </a>
                            </div>
                            <button type="button" class="py-2 px-4 rounded-md bg-white text-gray-800 font-bold flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2">New</span>
                            </button>
                        </div>
                        <div class="relative" x-show.transition="tab === 'regular'">
                            <div class="grid md:grid-cols-2 xl:grid-cols-3 rows-auto-rows gap-4">
                            @foreach($rewards as $index => $reward)
                                <div class="relative p-6 rounded-md bg-black bg-opacity-30" id="reward-{{ $index }}">
                                    <div class="flex flex-col items-center">
                                        <div class="flex-none w-16 sm:w-24 md:w-32 transition-all mb-4">
                                            <img src="{{ asset($reward->image) }}" class="h-auto w-full mx-auto"/>
                                        </div>
                                        <div class="flex-1 text-center">
                                            <p class="font-poppins text-base sm:text-xl md:text-3xl leading-none font-bold text-white tracking-tight transition-all">{{ $reward->name }}</p>
                                            <span class="text-base text-white">{{ $reward->description }}</span>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <div class="relative flex items-center justify-center mt-4">
                                            <span class="font-poppins bg-white font-bold text-purple-500 py-1 px-3 rounded-md">{{ $reward->point_count }} pts</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script>
        function tabs() {
            return {
                tab: window.location.hash ? window.location.hash.substring(1) : 'regular',
            }
        }
    </script>
</x-about-layout>
