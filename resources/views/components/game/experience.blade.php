<div class="relative flex items-center" title="Experience" data-title="Experience">
    <div class="relative bg-black bg-opacity-30 w-56 h-3 rounded">
        <div class="absolute top-0 left-0 h-3 bg-yellow-600 rounded transition" x-bind:style="`width : calc(100% * ${expLvl})`"></div>
    </div>
    <div class="ml-2">
        <span class="text-xs text-white font-bold" x-text="`${exp} / ${lvl}`"></span>
    </div>
</div>
