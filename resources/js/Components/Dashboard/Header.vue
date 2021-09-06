<template>
    <div class="relative w-full max-w-7xl px-8 mx-auto">
        <div class="mt-32 mb-16 ml-0 mr-auto" id="heading">
            <h1 class="text-6xl">
                {{ title }}
            </h1>
            <p class="mt-4 mb-6">
                {{ subtitle }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: String ?? 'Title',
        subtitle: String ?? 'Subtitle',
    },
    name: "Title"
}
</script>

<style scoped>

</style>
