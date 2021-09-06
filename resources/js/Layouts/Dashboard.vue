<template>
  <div class="relative min-h-screen bg-white dark:bg-gray-900 text-gray-800 dark:text-white transition ease-in-out duration-300">
      <header class="fixed z-40 top-0 left-0 h-16 w-full bg-white dark:bg-gray-800 shadow-md px-4 transition ease-in-out duration-300">
          <div class="relative h-16 flex items-center">
              <button type="button" class="mx-2 w-10 h-10 flex items-center justify-center rounded-full font-material text-3xl hover:bg-black hover:bg-opacity-10 dark:hover:bg-opacity-30 text-gray-800 dark:text-white transition ease-in-out duration-300" @click="toggleSidebar">
                  <span class="material-icons">menu</span>
              </button>
              <div class="relative">
                  <img src="/sprites/socit_logo.png" class="h-8 w-auto dark:filter dark:grayscale dark:contrast-200 dark:brightness-200 transition ease-in-out duration-300"/>
              </div>
              <div class="flex-1"></div>
              <div class="flex-none">
                  <theme-switcher/>
              </div>
              <div class="relative flex-none">
                  <div class="w-8 h-8 mx-3">
                      <img src="/images/default.gif" class="w-8 h-8 rounded-full object-cover"/>
                  </div>
              </div>
          </div>
      </header>
      <sidebar :active="sidebarActive" :isMobile="isMobile"/>
      <transition name="fade">
          <div class="fixed z-40 top-0 left-0 h-full w-full bg-black bg-opacity-50"
               v-if="isMobile && sidebarActive"
               @click="toggleSidebar"></div>
      </transition>
      <main class="relative z-0 pt-16 w-full transition-all ease-in-out"
        :class="[
            isMobile ? 'pl-0' : sidebarActive ? 'pl-64' : 'pl-24',
        ]">
          <div class="relative w-full">
              <router-view v-slot="{ Component, route }">
                  <transition name="fade" mode="out-in">
                      <component :is="Component" :key="route.path"/>
                  </transition>
              </router-view>
          </div>
      </main>
  </div>
</template>

<script>
import Sidebar from '../Components/Dashboard/Sidebar'
import ThemeSwitcher from "../Components/ThemeSwitcher";

export default {
    name: "Dashboard",
    components: {
        ThemeSwitcher,
        Sidebar
    },
    data() {
        return {
            sidebarActive: true,
            isMobile: false,
            windowWidth: window.innerWidth,
        }
    },
    watch: {
        windowWidth(newWidth, oldWidth) {
            if(newWidth <= 1280) {
                this.isMobile = true
                this.sidebarActive = false;
            } else {
                this.isMobile = false;
            }
        },
        $route(to, from) {
            if(this.isMobile) {
                this.sidebarActive = false;
            }
        }
    },
    mounted() {
        if (localStorage.theme === 'dark' || (!'theme' in localStorage && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.querySelector('html').classList.add('dark')
        } else if (localStorage.theme === 'dark') {
            document.querySelector('html').classList.add('dark')
        }
        if(window.innerWidth <= 1280) {
            this.isMobile = true
            this.sidebarActive = false;
        } else {
            this.isMobile = false;
        }
        window.addEventListener('resize', () => {
            this.windowWidth = window.innerWidth;
        });
    },
    methods: {
        toggleSidebar() {
            this.sidebarActive = !this.sidebarActive;
        },
        onWidthResize() {
        }
    }
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition-duration: 0.3s;
    transition-property: opacity;
    transition-timing-function: ease;
}

.fade-enter,
.fade-leave-active {
    opacity: 0
}
</style>
