<template>
    <div class="relative py-2">
        <div class="relative group border focus-within:border-blue-600 focus-within:ring-2 focus-within:ring-blue-500 rounded transition">
            <label :for="name"
                   class="absolute top-0 left-3 transform transition-all px-1.5 block"
                   :class="[
                       !isEmpty && isFocused ? '-translate-y-2 text-xs bg-white z-10' : (!isEmpty && !isFocused ? '-translate-y-2 text-xs bg-white z-10' : (isFocused ? '-translate-y-2 text-xs bg-white z-10' : 'translate-y-4 z-0')),
                       isFocused ? 'text-blue-500' : 'text-gray-500'
                   ]">
                <span class="block">
                    {{ label }}
                </span>
            </label>
            <input :type="inputType" :id="name"
                   :value="value"
                   @input="updateValue($event.target.value)"
                   @focus="isFocused = true"
                   @blur="isFocused = false"
                    class="relative z-0 border-0 bg-transparent w-full rounded py-4 px-4 focus:border-0" :disabled="disabled"/>
        </div>
        <div class="my-2 mx-1 flex items-center" v-if="type === 'password'">
            <input type="checkbox" :id="`${name}-checkbox`" class="rounded" @change="changePassToText"/>
            <label :for="`${name}-checkbox`" class="select-none">
                <span class="ml-2 text-sm">Show Password</span>
            </label>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            required: true,
            default: 'text',
        },
        name: {
            type: String,
            required: true,
            default: 'name',
        },
        label: {
            type: String,
            required: true,
            default: 'label',
        },
        value: {
            type: String,
            default: '',
        },
        disabled: {
            type: Boolean,
            default: false,
        }
    },
    name: "Input",
    data() {
        return {
            isEmpty: true,
            isFocused: false,
            inputType: this.type,
        }
    },
    watch: {
        value(newValue, oldValue) {
            newValue !== '' ? this.isEmpty = false : this.isEmpty = true;
        }
    },
    mounted() {
        if(this.value != '' || this.value != null) {
            this.isEmpty = true;
        }
    },
    methods: {
        updateValue(value) {
            this.$emit('update:' + this.name + '-value', value);
        },
        changePassToText() {
            if(this.inputType === 'password') {
                this.inputType = 'text'
            } else if(this.inputType === 'text') {
                this.inputType = 'password'
            }
        }
    }
}
</script>

<style scoped>

</style>
