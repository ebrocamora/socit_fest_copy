<template>
    <div class="relative my-4 bg-gray-100 dark:bg-gray-800 rounded-md p-2 transition ease-in-out duration-300">
        <div class="relative overflow-x-auto">
            <table class="relative table w-full border-collapse">
                <slot/>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "Table"
}
</script>

<style scoped>

</style>
