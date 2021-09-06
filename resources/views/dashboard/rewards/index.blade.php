@extends('layouts.dashboard')

@section('title')
    Rewards
@endsection

@section('content')
    <div class="relative flex min-h-screen -mt-16 pt-16 overflow-hidden" x-data="rewardsApi()" x-init="getRewards()">
        <div class="relative h-full flex-1 overflow-y-auto">
            <div class="flex flex-col h-full flex-auto">
                <div class="flex flex-col sm:flex-row items-start sm:items-center sm:justify-between p-6 sm:py-12 md:px-8 border-b bg-white dark:bg-transparent">
                    <div>
                        <div class="text-4xl font-extrabold tracking-tight leading-none">
                            Rewards
                        </div>
                        <div class="flex items-center mt-0.5 font-medium text-secondary">
                            <template x-if="isRewardsLoading">
                                <div class="relative h-5 bg-gray-200 rounded w-24"></div>
                            </template>
                            <template x-if="!isRewardsLoading">
                                <span>{{ count($rewards) . ' rewards' }}</span>
                            </template>
                        </div>
                    </div>
                </div>
                <div class="p-6 flex h-full flex-wrap">
                    <template x-for="reward in rewards">
                        <div class="relative w-40 h-40 m-2 p-4 shadow rounded-2xl transition select-none cursor-pointer hover:bg-gray-100" x-on:click="showItem(reward)"
                            :class="[ reward.id === selectedReward.id ? 'bg-purple-100' : 'bg-white' ]">
                            <div class="relative mb-3">
                                <img :src="`/${reward.image}`" class="h-20 w-auto mx-auto">
                            </div>
                            <div class="relative text-center w-full">
                                <span class="block font-bold overflow-hidden h-5" x-text="reward.name"></span>
                                <span class="block text-sm" x-text="`${reward.point_count} pts`"></span>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
        <div class="relative flex-none overflow-x-hidden transition-all ease-in-out duration-300 w-0" :class="[ isSideModalVisible ? 'lg:w-96' : 'lg:w-0' ]">
            <div class="fixed w-96 h-full border-l bg-white overflow-y-auto">
                <div class="flex flex-col h-full">

                    <div class="px-4 py-4 w-full flex justify-end">
                        <button type="button" x-on:click="hideModal()" class="w-10 h-10 rounded-full hover:bg-gray-200 focus:outline-none transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="relative">
                        <section class="relative flex flex-col p-6">
                            <div class="aspect-w-9 aspect-h-6">
                                <div class="flex items-center justify-center p-4 border rounded-lg bg-gray-50 dark:bg-gray-100">
                                    <img :src="`/${selectedReward.image ?? ''}`" class="w-24 h-auto mx-auto">
                                </div>
                            </div>
                            <div class="flex flex-col items-start mt-8">
                                <div class="text-xl font-medium">
                                    <span x-text="selectedReward.name"></span><br/>
                                    <span class="text-sm text-gray-500" x-text="selectedReward.description"></span>
                                </div>
                                <div class="mt-1 px-1.5 rounded text-sm font-semibold leading-5 text-white bg-green-600">
                                    <span x-text="`${selectedReward.point_count} pts`"></span>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="relative h-16 p-4 flex items-center">

                    </div>
                </div>
            </div>
            <div class="fixed top-0 left-0 bg-black bg-opacity-30"></div>
        </div>
    </div>

    <script>
        function rewardsApi() {
            return {
                rewards: [],
                selectedReward: {},
                isRewardsLoading: false,
                isSideModalVisible: false,
                async getRewards() {
                    this.isRewardsLoading = true;
                    axios.get('/api/rewards')
                        .then((res) => {
                            this.rewards = res.data.rewards;
                            this.isRewardsLoading = false;
                        })
                        .catch((err) => {
                            console.log(err);
                        })
                },
                showItem(item) {
                    this.selectedReward = item;
                    this.isSideModalVisible = true;
                },
                hideModal() {
                    this.isSideModalVisible = false;
                    this.selectedReward = {};
                }
            }
        }
    </script>
@endsection
