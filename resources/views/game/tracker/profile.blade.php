<div>
    <div class="relative flex items-center">
        <div class="flex-none">
            <div class="relative w-26 h-26 border border-2 border-purple-500">
                <img src="{{ auth()->user()->profile_photo_path ?? '/images/default.gif' }}" class="h-24 w-24 object-cover"/>
            </div>
        </div>
        <div class="flex-none ml-4">
            <div class="relative">
                <div class="text-2xl text-purple-300 font-bold">
                    {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}
                </div>
                <div class="flex items-center">
                    <div class="text-sm text-white">
                        {{ '@' . auth()->user()->username }}
                    </div>
                    <span class="mx-2">•</span>
                    <div class="text-sm text-white flex items-center mt-0.5">
                        @php($email = explode("@",auth()->user()->email))
                        @if($email[1] === 'student.apc.edu.ph' || $email[1] === 'apc.edu.ph')
                            {{ __('Asia Pacific College') }}
                        @elseif($email[1] === 'student.national-u.edu.ph' || $email[1] === 'national-u.edu.ph')
                            {{ __('National University') }}
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-1">
                @include('components.game.experience')
            </div>
        </div>
        <div class="absolute -bottom-10 right-0">
            <button type="button" class="h-14 w-14 rounded-full bg-green-500 hover:bg-green-600 shadow hover:shadow-md transition-all" title="Claim reward" x-on:click="openClaimModal">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </button>
        </div>
    </div>
</div>

{{--<script>--}}
{{--    function reward() {--}}
{{--        return {--}}
{{--            // isClaimModalVisible: false,--}}
{{--            openClaimModal() {--}}
{{--                // this.isClaimModalVisible = true;--}}
{{--                Swal.fire({--}}
{{--                    title: 'Enter reward code',--}}
{{--                    showCancelButton: true,--}}
{{--                    confirmButtonText: 'Submit',--}}
{{--                    backdrop: 'rgba(124, 58, 237, .8)',--}}
{{--                    input: 'text',--}}
{{--                    inputValidator: (value) => {--}}
{{--                        if (!value) {--}}
{{--                            return 'You need to write something!'--}}
{{--                        }--}}
{{--                    },--}}
{{--                    showLoaderOnConfirm: true,--}}
{{--                    preConfirm: (reward) => {--}}
{{--                        return axios.post(`/api/rewards/claim/${reward}`)--}}
{{--                            .then((res) => {--}}
{{--                                if(!res.data.reward) {--}}
{{--                                    if(res.data.status === 'already claimed') {--}}
{{--                                        return Swal.showValidationMessage(--}}
{{--                                            `${res.data.message}`--}}
{{--                                        )--}}
{{--                                    }--}}
{{--                                    return Swal.showValidationMessage(--}}
{{--                                        `No reward found for code&nbsp;<strong>'${reward}'</strong>`--}}
{{--                                    )--}}
{{--                                }--}}
{{--                                return res.data;--}}
{{--                            })--}}
{{--                            .catch(error => {--}}
{{--                                Swal.showValidationMessage(--}}
{{--                                    `${error}`--}}
{{--                                )--}}
{{--                            })--}}
{{--                    }--}}
{{--                }).then((result) => {--}}
{{--                    if (result.isConfirmed) {--}}
{{--                        console.log(result);--}}
{{--                        this.$dispatch('updated-exp');--}}
{{--                        Swal.fire({--}}
{{--                            toast: true,--}}
{{--                            icon: 'success',--}}
{{--                            titleText: `You earned ${result.value.reward.point_count} EXP points`,--}}
{{--                            position: 'top-end',--}}
{{--                            showConfirmButton: false,--}}
{{--                            timer: 3000,--}}
{{--                            timerProgressBar: true,--}}
{{--                            didOpen: (toast) => {--}}
{{--                                toast.addEventListener('mouseenter', Swal.stopTimer)--}}
{{--                                toast.addEventListener('mouseleave', Swal.resumeTimer)--}}
{{--                            }--}}
{{--                        })--}}
{{--                    }--}}
{{--                })--}}
{{--            },--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
