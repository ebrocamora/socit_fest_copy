<x-about-layout>
    <div class="relative pt-8 px-8 md:px-16">
        <div class="max-w-screen-lg xl:max-w-screen-xl mx-auto transition-all">
            @if(auth()->user()->isNotBanned())
            @else
                <div class="relative text-center sm:pt-6 transition-all text-white">
                    <span class="font-bold">You are banned from updating your profile.</span>
                </div>
            @endif
        </div>
    </div>
</x-about-layout>
