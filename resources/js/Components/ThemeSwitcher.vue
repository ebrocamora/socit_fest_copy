<template>
    <button id="switchTheme" class="relative mx-2 h-10 w-10 flex justify-center items-center focus:outline-none text-yellow-500" @click="toggleTheme()">
        <svg class="w-6 h-6 darkModeButton" :class="[ darkMode ? 'dark-active' : '']" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path class="transition-all" fill-rule="evenodd" clip-rule="evenodd"
                  d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z">
            </path>
        </svg>
    </button>
</template>

<script>
export default {
    name: "ThemeSwitcher",
    data() {
        return {
            darkMode: false,
        }
    },
    mounted() {
        if (localStorage.theme === 'dark' || (!'theme' in localStorage && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.querySelector('html').classList.add('dark')
            this.darkMode = true;
        } else if (localStorage.theme === 'dark') {
            document.querySelector('html').classList.add('dark')
            this.darkMode = true;
        }
    },
    methods: {
        toggleTheme() {
            let htmlClasses = document.querySelector('html').classList;
            if(localStorage.theme == 'dark') {
                htmlClasses.remove('dark');
                localStorage.removeItem('theme');
                this.darkMode = false;
            } else {
                htmlClasses.add('dark');
                localStorage.theme = 'dark';
                this.darkMode = true;
            }
        }
    },
}
</script>

<style scoped>
.darkModeButton.dark-active path {
    d: path('M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z');
}
</style>
