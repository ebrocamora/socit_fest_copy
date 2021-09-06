<div class="relative">
    <div class="relative grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 transition">
        @foreach($roles as $role)
            <div class="relative p-4 bg-black bg-opacity-30 rounded-md">
                <div class="relative mb-4">
                    <span class="block text-lg sm:text-xl lg:text-3xl text-white font-bold font-poppins p-2">
                        {{ $role->name }}
                    </span>
                </div>
                <div class="relative flex flex-wrap gap-2">
                    @foreach($role->permissions as $permission)
                        <span class="inline-block flex-none bg-purple-800 rounded text-sm text-white py-1 px-2">
                            {{ $permission->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
