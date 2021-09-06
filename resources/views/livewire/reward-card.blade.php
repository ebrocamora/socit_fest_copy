{{--<section class="relative p-6 relative rounded-md bg-black bg-opacity-30" id="task-1">--}}
{{--    <div class="flex items-center">--}}
{{--        <div class="flex-none w-16 sm:w-24 md:w-32 transition-all">--}}
{{--            @if($rewardReceived)--}}
{{--                <img src="{{ asset($reward->image) }}" class="h-auto w-full mx-auto"/>--}}
{{--            @else--}}
{{--                <img src="{{ asset($reward->image_blank) }}" class="h-auto w-full mx-auto"/>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <div class="flex-1 ml-4 md:ml-8">--}}
{{--            <p class="font-poppins text-base sm:text-xl md:text-3xl leading-none font-bold text-white tracking-tight transition-all">{{ $reward->name }}</p>--}}
{{--            <span class="text-base">{{ $reward->description }}</span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="relative">--}}
{{--        <div class="relative flex items-center justify-between mt-4">--}}
{{--            <div class="flex-none flex justify-center md:w-32">--}}
{{--                <span class="font-poppins bg-white font-bold text-purple-500 py-1 px-3 rounded-md">{{ $reward->point_count }} pts</span>--}}
{{--            </div>--}}

{{--            @if($claimedOn)--}}
{{--            <div class="flex-none text-right">--}}
{{--                <div class="relative leading-snug">--}}
{{--                    <span class="font-bold text-sm">Claimed on:</span><br/>--}}
{{--                    <span>{{ $claimedOn }}</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<div class="relative w-40 h-full m-2 @if($rewardReceived)shadow hover:bg-gray-200 cursor-pointer @endif rounded-xl transition select-none bg-white" x-on:click="showItem(reward)" >
{{--     :class="[ reward.id === selectedReward.id ? 'bg-purple-100' : 'bg-white' ]"--}}

    @if($rewardReceived)
    <div class="relative mb-3 pt-4 px-4 pb-2">
        <img src="{{ asset($reward->image) }}" class="h-20 w-auto mx-auto"/>
    </div>
    <div class="relative text-center w-full pt-2 px-4 pb-4">
        <span class="block font-bold">{{ $reward->name }}</span>
        <span class="inline-block px-1 py-0.5 text-sm bg-purple-500 rounded font-bold text-white">{{ $reward->point_count }} pts</span>
    </div>
    @else
        <div class="relative w-40 h-40 flex flex-col items-center justify-center p-4 text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
            <div class="mt-2 text-center">
                <span class="block text-xs leading-tight">To unlock this, you need to attend an event.</span>
            </div>
        </div>
    @endif
</div>
