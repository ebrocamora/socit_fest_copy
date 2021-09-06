<template>
    <aside class="fixed z-40 top-0 left-0 h-full w-64 bg-gray-800 overflow-y-auto overflow-x-hidden transition-all ease-in-out duration-300 transform border-r">
        <div class="">

        </div>
        <div class="flex flex-col items-center w-full p-4">
            <div class="relative w-24 h-24">
                <img alt="User avatar" class="w-full h-full rounded-full ng-star-inserted" src="">
            </div>
        </div>
    </aside>
<!--    <aside class="fixed z-30 top-0 left-0 h-full bg-gray-50 dark:bg-gray-800 dark:shadow-md overflow-y-auto overflow-x-hidden transition-all ease-in-out duration-300 transform"-->
<!--        :class="[-->
<!--            isMobile ? 'is-mobile' : 'is-desktop',-->
<!--            active ? 'active' : ''-->
<!--            ]">-->
<!--        <div class="relative h-16 border-b py-2">-->

<!--        </div>-->
<!--        <nav class="relative mt-2 pt-2">-->
<!--            <ul class="relative text-gray-500 dark:text-white">-->
<!--                <li v-for="item in menuItems" class="pr-6">-->
<!--                    <router-link :to="{ name: item.route }" class="px-4 py-2 flex items-center hover:bg-black hover:bg-opacity-10 dark:hover:bg-opacity-30 rounded-r-full transition ease-in-out duration-300" active-class="text-blue-500 bg-blue-100 font-bold">-->
<!--                        <div class="flex-none flex justify-center mr-2 min-w-[56px]">-->
<!--                            <span class="material-icons">{{ item.icon }}</span>-->
<!--                        </div>-->
<!--                        <div class="flex-1 py-2 transition-all" :class="[ active ? 'opacity-100 visible' : 'opacity-0 invisible' ]">-->
<!--                            <span v-text="item.name"></span>-->
<!--                        </div>-->
<!--                    </router-link>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </nav>-->
<!--    </aside>-->
</template>

<script>
export default {
    name: "Sidebar",
    props: {
        active: Boolean ?? true,
        isMobile: Boolean ?? false,
    },
    data() {
        return {
            menuItems: [
                {
                    name: 'Dashboard',
                    icon: 'dashboard',
                    route: 'dashboard-index',
                },
                {
                    name: 'Roles',
                    icon: 'manage_accounts',
                    route: 'dashboard-roles',
                },
                {
                    name: 'Users',
                    icon: 'people',
                    route: 'dashboard-users',
                },
                {
                    name: 'Rewards',
                    icon: 'emoji_events',
                    route: 'dashboard-rewards',
                },
            ]
        }
    }
}
</script>

<style scoped>
.is-desktop {
    --tw-translate-x: 0rem;
    width: 6rem;
}
.is-mobile {
    --tw-translate-x: -16rem;
    width: 16rem;
    z-index: 50;
}
.is-desktop.active {
    width: 16rem;
}
.is-mobile.active {
    --tw-translate-x: 0rem;
}
</style>
