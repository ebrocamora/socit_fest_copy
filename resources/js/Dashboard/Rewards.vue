<template>
    <div class="relative">
        <div class="w-full">
            <dashboard-header title="Rewards" subtitle="Rewards that are used during the event"/>
            <div class="border-b dark:border-gray-800">
                <div class="relative w-full max-w-7xl px-8 mx-auto">
                    <ul class="flex items-center transition-all">
                        <li v-for="tab in rewardTabs" class="flex-1 lg:flex-none transition-all">
                            <button role="tab" @click="changeRewardTab(tab.slug)"
                                class="h-12 w-full px-16 border-b-2 hover:bg-blue-50 dark:hover:bg-black dark:hover:bg-opacity-30 transition"
                                :class="[
                                    activeRewardTab === tab.slug ? 'text-blue-500 border-blue-500' : 'text-gray-500 dark:text-white border-b-transparent'
                                ]">
                                <span class="font-bold">{{ tab.name }}</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "Rewards",
    data() {
        return {
            rewardTabs: [
                {
                    name: 'Regular',
                    slug: 'regular',
                },
                {
                    name: 'Custom',
                    slug: 'custom',
                },
            ],
            activeRewardTab: 'regular',
        }
    },
    methods: {
        changeRewardTab(name) {
            this.activeRewardTab = name;
        }
    }
}
</script>

<style scoped>

</style>
