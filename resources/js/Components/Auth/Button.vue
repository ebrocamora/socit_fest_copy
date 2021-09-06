<template>
    <button :type="type" v-if="as !== 'link'">
        <span :class="[
            className,
            'text-sm font-bold py-2 rounded transition',
            primary ? 'px-4 bg-blue-500 hover:bg-blue-600 text-white hover:shadow' : 'px-2 hover:bg-blue-50 text-blue-500'
        ]">
            {{ value }}
        </span>
    </button>

    <router-link :to="to" v-else>
        <span :class="[
            className,
            'text-sm font-bold py-2 rounded transition',
            primary ? 'px-4 bg-blue-500 hover:bg-blue-600 text-white hover:shadow' : 'px-2 hover:bg-blue-50 text-blue-500'
        ]">
            {{ value }}
        </span>
    </router-link>
</template>

<script>
export default {
    props: {
        primary: {
            type: Boolean,
            default: false,
        },
        type: {
            type: String,
            default: 'button',
        },
        link: {
            type: String,
            default: 'button'
        },
        value: {
            type: String,
            required: true,
            default: 'Button',
        },
        className: {
            type: String,
        },
        as: {
            type: String,
            default: 'button'
        },
        to: {
            type: String,
            default: '/'
        }
    },
    name: "Button"
}
</script>

<style scoped>

</style>
