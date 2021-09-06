<x-about-layout>
    <x-page-header>
        <section class="font-poppins">
            <span class="h-16 w-16 rounded-xl bg-gradient-to-br flex items-center justify-center from-[#5e60ce] to-[#6930c3] text-white mb-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
            </span>
            <h2 class="sm:text-lg sm:leading-snug font-semibold tracking-wide uppercase text-white mb-3">Admin > Roles</h2>
            <p class="text-3xl sm:text-5xl lg:text-6xl leading-none font-extrabold text-white tracking-tight mb-8 capitalize">
                {{ $role->name }}</p>
        </section>
    </x-page-header>
    <div class="relative pt-8 px-8 md:px-16">
        <div class="max-w-screen-lg xl:max-w-screen-xl mx-auto transition-all">
            <section id="roles-form" class="relative mb-12">
                <livewire:admin.roles.form />
            </section>
            <section id="roles-list" class="relative mb-4">
                <p class="text-lg sm:text-xl lg:text-3xl leading-none font-poppins font-extrabold text-white tracking-tight mb-4">Roles List</p>
                <livewire:admin.roles.roles-list />
            </section>
        </div>
    </div>

    <script>
        function showStatus(event) {
            console.log(event);
            Swal.fire({
                icon: event.type,
                title: event.title,
                showConfirmButton: false,
                toast: event ?? false,
                height: 100,
                position: 'top-end',
            })
        }

        document.addEventListener('DOMContentLoaded', () => {
            this.livewire.on('status', event => {
                showStatus(event);
            });
        });
    </script>
</x-about-layout>
