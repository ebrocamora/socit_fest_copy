<x-about-layout>
    <x-page-header>
        <section id="leaderboard" class="font-poppins">
            <span class="h-16 w-16 rounded-xl bg-gradient-to-br flex items-center justify-center from-[#5e60ce] to-[#6930c3] text-white mb-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                </svg>
            </span>
            <p class="text-3xl sm:text-5xl lg:text-6xl leading-none font-extrabold text-white tracking-tight mb-8">Leaderboard</p>
        </section>
    </x-page-header>
    <div class="relative pt-8 px-8 md:px-16">
        <div class="max-w-screen-lg xl:max-w-screen-xl mx-auto">
            <livewire:leaderboard/>
        </div>
    </div>
</x-about-layout>
