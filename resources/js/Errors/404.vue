<template>
    <error-layout error=404 message="Page not found"/>
</template>

<script>
import ErrorLayout from '../Layouts/Error'

export default {
    name: "404",
    components: {
        ErrorLayout,
    }
}
</script>

<style scoped>

</style>
