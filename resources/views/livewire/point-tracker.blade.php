<div class="relative flex flex-col sm:flex-row sm:items-center gap-4 justify-between mb-8">
    <div class="flex-none">
        <span class="text-xl font-bold text-white">Points earned: </span>
        <span class="text-xl font-bold text-white">{{ $points }}</span>
    </div>
    @can('rewards:read')
    <div class="flex-none">
        @if(auth()->user()->isNotBanned())
            <button type="button" @click="codeInput()" class="bg-white rounded-md py-2 px-4 font-bold">
                Add a code
            </button>
        @else
            <div class="relative transition-all text-white">
                <span class="font-bold">You are not allowed to redeem rewards.</span>
            </div>
        @endif
    </div>
    @endcan
</div>
