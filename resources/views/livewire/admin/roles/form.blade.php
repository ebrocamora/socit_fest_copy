<div class="relative">
    <form wire:submit.prevent="submit">
        <div class="relative">
            <label class="block text-white font-bold mb-2" for="role-name">Role name</label>
            <fieldset class="flex">
                <div class="flex-1 mr-4">
                    <input type="text" id="role-name" wire:model.defer="name" class="w-full rounded-md bg-black bg-opacity-30 text-white focus:ring-2 focus:ring-purple-400 border-0 transition"/>
                    @error('name') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="flex-none">
                    <button type="submit" class="py-2 px-4 bg-white hover:bg-gray-200 font-poppins font-bold rounded-md shadow focus:ring-2 focus:ring-purple-400 transition" title="Create role">Create</button>
                </div>
            </fieldset>
        </div>
    </form>
</div>
