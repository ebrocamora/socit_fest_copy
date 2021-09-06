<template>
    <div class="relative">
        <div class="w-full">
            <dashboard-header title="Users" subtitle="List of currently registered users"/>
            <div class="relative w-full max-w-7xl px-8 mx-auto">
                <dashboard-table>
                    <thead class="table-header-group">
                        <tr class="table-row bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white transition ease-in-out duration-300">
                            <th class="px-6 w-12 rounded-l text-left">
                                <span class="inline-flex items-center justify-center p-3 rounded-full hover:bg-gray-300 dark:hover:bg-gray-800 transition">
                                    <input type="checkbox" class="h-5 w-5 rounded text-green-500 bg-transparent border-2 focus:ring-0 focus:ring-offset-0 cursor-pointer"/>
                                </span>
                            </th>
                            <th class="text-left" colspan="2">
                                <span class="inline-flex items-center justify-center p-3">
                                    Name
                                </span>
                            </th>
                            <th class="text-left">
                                <span class="inline-flex items-center justify-center p-3">
                                    School
                                </span>
                            </th>
                            <th class="text-left">
                                <span class="inline-flex items-center justify-center p-3">
                                    Role
                                </span>
                            </th>
                            <th class="text-left">
                                <span class="inline-flex items-center justify-center p-3">
                                    Verified
                                </span>
                            </th>
                            <th class="text-center">
                                <span class="inline-flex items-center justify-center p-3">
                                    Status
                                </span>
                            </th>
                            <th class="px-6 rounded-r text-left">
                                <span class="inline-flex items-center justify-center p-3">

                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-body-group">
                        <template v-if="!isUsersLoading">
                            <template v-if="users.data.length > 0">
                                <tr class="table-row text-gray-800 dark:text-white transition ease-in-out duration-300" v-for="user in users.data" :key="user.id">
                                    <td class="px-6 w-12 rounded-l text-left">
                                        <span class="inline-flex items-center justify-center p-3 rounded-full hover:bg-gray-200 dark:hover:bg-gray-900 transition">
                                            <input type="checkbox" class="h-5 w-5 rounded text-green-500 bg-transparent border-2 focus:ring-0 focus:ring-offset-0 cursor-pointer"/>
                                        </span>
                                    </td>
                                    <td class="w-16 text-left">
                                        <span class="inline-flex items-center justify-center p-3">
                                            <img :src="user.profile_photo_path ? user.profile_photo_path : '/images/default.gif'" class="h-8 w-8 rounded-full">
                                        </span>
                                    </td>
                                    <td class="text-left">
                                        <span class="inline-flex items-center justify-center py-3 pr-3 font-bold">
                                            {{ user.first_name + ' ' + user.last_name }}
                                        </span>
                                    </td>
                                    <td class="text-left">
                                        <span class="inline-flex items-center justify-center p-3">
                                            {{ user.email ? checkSchoolViaEmail(user.email) : '' }}
                                        </span>
                                    </td>
                                    <td class="text-left">
                                        <span class="inline-flex items-center justify-center py-1 px-2 text-sm font-bold text-white bg-green-500 rounded-full" v-if="user.roles[0]">
                                                {{ user.roles[0].name }}
                                        </span>
                                        <span class="text-sm" v-else>None</span>
                                    </td>
                                    <td class="text-left">
                                        <span class="inline-flex items-center justify-center p-3">
                                            {{ user.email_verified_at ? 'Yes' : 'No' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="inline-flex items-center justify-center py-1 px-2 text-sm font-bold text-white rounded-full"
                                            :class="[ user.banned_at ? 'bg-red-500' : 'bg-green-500' ]">
                                            {{ user.banned_at ? 'Banned' : 'Active' }}
                                        </span>
                                    </td>
                                    <td class="px-6 rounded-r text-center">
                                        <span class="inline-flex items-center justify-center p-3">
                                            <router-link :to="{ name: 'dashboard-users-user', params: { id: user.id }  }" class="h-10 w-10 rounded-full hover:bg-black hover:bg-opacity-30 p-2 mx-2 transition ease-in-out duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </router-link>
                                            <button type="button" class="h-10 w-10 rounded-full hover:bg-black hover:bg-opacity-30 p-2 mx-2 transition ease-in-out duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </td>
                                </tr>
                            </template>
                            <template v-else>
                                <tr class="table-row text-gray-800 dark:text-white transition ease-in-out duration-300">
                                    <td class="text-center" colspan="8">
                                        <span class="inline-flex items-center justify-center py-3 pr-3 font-bold">
                                            No users data found
                                        </span>
                                    </td>
                                </tr>
                            </template>
                        </template>
                        <template v-else>
                            <tr class="table-row">
                                <td class="text-center" colspan="8">
                                    <span class="inline-flex items-center justify-center py-3 pr-3 font-bold">
                                        Loading user data
                                    </span>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </dashboard-table>
                <div class="relative py-2">
                    <div class="flex items-center justify-between p-2">
                        <div class="flex-none">
                            <span class="text-white text-sm">
                                Showing <strong>{{ users.from }}</strong> to <strong>{{ users.to }}</strong> of <strong>{{ users.total }}</strong> results
                            </span>
                        </div>
                        <div class="flex-none">
                            <span class="relative z-0 inline-flex rounded-md shadow-sm">
                                <span>
                                    <span aria-disabled="true" aria-label="&amp;laquo; Previous" v-if="currentUsersPage === 1">
                                        <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5" aria-hidden="true">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <button @click="getPrevPageUserList()" dusk="nextPage.after" rel="next" v-else class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Next &amp;raquo;">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </span>

                                <span v-for="page in users.last_page">
                                    <span aria-current="page" v-if="page === currentUsersPage">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium bg-gray-200 text-gray-500 bg-white border border-gray-300 cursor-default leading-5">{{ page }}</span>
                                    </span>
                                    <button @click="goToPage(page)" v-else class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="Go to page 2">
                                    {{ page }}
                                    </button>
                                </span>

                                <span>
                                    <span aria-disabled="true" aria-label="&amp;laquo; Previous" v-if="currentUsersPage === users.last_page">
                                        <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5" aria-hidden="true">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <button @click="getNextPageUserList()" dusk="nextPage.after" rel="next" v-else class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Next &amp;raquo;">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Users",
    data() {
        return {
            users: [],
            isUsersLoading: true,
            errors: {},
            currentUsersPage: 1,
        }
    },
    watch: {
        currentUsersPage(newPage, oldPage) {
            if(newPage <= this.users.last_page && newPage >= 1) {
                this.getUserList(newPage)
            }

            if(newPage > this.users.last_page) {
                this.currentUsersPage = this.users.last_page
            }

            if(newPage < 1) {
                this.currentUsersPage = 1
            }
        }
    },
    mounted() {
        this.getUserList(1)
    },
    methods: {
        getUserList(page) {
            this.isUsersLoading = true;
            axios.get('/api/user/all?page=' + page)
                .then((res) => {
                    this.users = res.data.users
                    this.isUsersLoading = false
                })
                .catch((err) => {
                    this.errors.users.message = "Error retrieving users";
                })
        },
        getNextPageUserList() {
            this.currentUsersPage++
        },
        getPrevPageUserList() {
            this.currentUsersPage--
        },
        goToPage(page) {
            this.currentUsersPage = page
        },
        checkSchoolViaEmail(email) {
            let emailArray = email.split('@');

            if(emailArray[1] === 'student.apc.edu.ph' || emailArray[1] === 'apc.edu.ph') {
                return 'Asia Pacific College'
            } else if(emailArray[1] === 'student.national-u.edu.ph' || emailArray[1] === 'national-u.edu.ph') {
                return 'National University'
            }

            return 'No school'
        }
    }
}
</script>

<style scoped>

</style>
