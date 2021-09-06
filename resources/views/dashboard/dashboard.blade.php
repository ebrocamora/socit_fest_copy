<x-about-layout>
    <x-page-header>
        <section id="dashboard" class="font-poppins">
            <span class="h-16 w-16 rounded-xl bg-gradient-to-br flex items-center justify-center from-[#5e60ce] to-[#6930c3] text-white mb-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                </svg>
            </span>
            <p class="text-3xl sm:text-5xl lg:text-6xl leading-none font-extrabold text-white tracking-tight mb-8">Points Tracker</p>
        </section>
    </x-page-header>
    <div class="relative pt-8 px-8 md:px-16">
        <div class="max-w-screen-lg xl:max-w-screen-xl mx-auto transition-all" x-data="codeForm()">
                @livewire('point-tracker')
                @can(['rewards:read', 'rewards:redeem'])
                    <div class="grid xl:grid-cols-2 gap-4 sm:pt-6 transition-all text-white">
                        @foreach($rewards as $reward)
                            @livewire('reward-card', ['reward' => $reward])
                        @endforeach
                    </div>
                @else
                    <div class="relative text-center sm:pt-6 transition-all text-white">
                        <span class="font-bold">You are not allowed to view rewards.</span>
                    </div>
                @endcannot
        </div>
    </div>

    @can(['rewards:read', 'rewards:redeem'])
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'apiToken' => $currentUser->api_token ?? null,
        ]) !!};
    </script>

    <script>
        function codeForm() {
            return {
                async codeInput() {
                    const { value: eventCode } = await Swal.fire({
                        title: 'Enter event code',
                        input: 'text',
                        inputValue: '',
                        showCancelButton: true,
                        showLoaderOnConfirm: true,
                        confirmButtonText: 'Submit',
                        inputValidator: (value) => {
                            if (!value) {
                                return 'You need to write something!'
                            }
                        },
                    })

                    if (eventCode) {
                        return livewire.emit('codeSubmitted', eventCode);
                    }
                },
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            this.livewire.on('code:error', code => {
                Swal.fire({
                    icon: 'error',
                    title: 'No such code',
                    html: 'Reward not found with code <strong>' + code + '</strong>',
                })
            });

            this.livewire.on('code:success', reward => {
                Swal.fire({
                    icon: 'success',
                    title: 'Reward claimed successfully',
                    html: '<strong>' + reward + '</strong>',
                })
            });

            this.livewire.on('user:banned', reward => {
                Swal.fire({
                    icon: 'error',
                    title: 'Banned from claiming rewards',
                })
            });

            this.livewire.on('code:exists', reward => {
                Swal.fire({
                    icon: 'error',
                    title: 'Reward already claimed',
                    html: '<strong>' + reward + '</strong>',
                })
            });
        });
    </script>
    @endcanany
</x-about-layout>
