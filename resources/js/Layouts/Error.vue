<template>
    <div class="relative flex items-center justify-center min-h-screen bg-gray-100 text-gray-500">
        <h1 class="text-2xl pr-4 border-r ml-4" v-text="error"></h1>
        <span class="text-lg pl-4" v-text="message"></span>
    </div>
    <router-view></router-view>
</template>

<script>
export default {
    props: {
        error: String ?? 404,
        message: String ?? 'Not found',
    },
    name: "Error",
}
</script>

<style scoped>

</style>
