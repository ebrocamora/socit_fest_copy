<div class="fixed z-40 top-0 left-0 h-16 w-full bg-white shadow pl-64">
    <div class="h-16 flex items-center px-4">
        <div class="flex-1"></div>
        <div class="flex-none">
            <div class="relative flex h-16 items-center" x-data="{ userMenuActive: false }">
                <button type="button" class="border-2 rounded-full focus:outline-none transition" x-on:click="userMenuActive = !userMenuActive"
                    :class="[ userMenuActive ? 'border-purple-300' : '']">
                    <img src="{{ auth()->user()->profile_photo_path ?? asset('/images/default.gif') }}" class="h-10 w-10 rounded-full object-cover"/>
                </button>
                <div class="absolute top-16 right-0 w-48 bg-white rounded shadow-md overflow-x-hidden" x-show.transition.origin.top.right="userMenuActive" @click.away="userMenuActive = false" style="display: none">
                    <section class="relative border-b">
                        <div>
                            <a href="{{ route('account.me') }}" class="block py-2 px-4 hover:bg-purple-100 hover:text-purple-700">
                                <span class="text-sm">Profile</span>
                            </a>
                        </div>
                    </section>
                    @can('role:create|role:read|role:update|role:delete')
                        <section class="relative border-b">
                            <div>
                                <a href="{{ route('admin.dashboard.index') }}" class="block py-2 px-4 hover:bg-purple-100 hover:text-purple-700">
                                    <span class="text-sm">Admin Dashboard</span>
                                </a>
                            </div>
                        </section>
                    @endcan
                    <section class="relative border-b">
                        <div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" class="block py-2 px-4 text-left w-full hover:bg-purple-100 hover:text-purple-700 focus:outline-none">
                                    <span class="text-sm">Logout</span>
                                </button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
