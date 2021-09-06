<template>
    <div class="relative min-h-screen bg-white flex items-center justify-center text-gray-800">
        <div class="relative w-[435px] border rounded h-auto transition overflow-hidden my-8">
            <!-- progress bar -->

            <!-- auth form -->
            <div class="relative py-8 px-6">
                <div>
                    <div class="h-8 flex justify-center">
                        <img src="/sprites/socit_logo.png" class="h8 w-auto"/>
                    </div>
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Auth",
    beforeCreate() {
        if(window.authUser) {
            this.$router.push({
                path: '/dashboard',
            });
        }
    }
}
</script>

<style scoped>

</style>
