<template>
    <div class="w-full h-full overflow-hidden bg-gray-100">
        <div class="flex flex-col">
            <!-- Cover Background with Gradient -->
            <div class="w-full bg-gradient-to-r from-white to-blue-400 h-40 sm:h-44 md:h-48 lg:h-10 xl:h-50">
                <!-- Additional content can go here -->
            </div>
            <div
                class="relative w-[90%] sm:w-[80%] mx-auto flex flex-col sm:flex-row justify-between items-center -mt-25">
                <img :src="userProfile.profile"
                    class="rounded-full w-28 h-28 sm:w-32 sm:h-32 md:w-40 md:h-40 lg:w-48 lg:h-48 border-4 border-white shadow-lg" />
                <button type="button"
                    class="px-4 py-2 -mb-25 sm:mt-0 sm:ml-4 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <el-icon class="mr-2">
                        <EditPen />
                    </el-icon>
                    Edit Profile
                </button>
            </div>
            <div class="xl:w-[80%] lg:w-[90%] md:w-[90%] sm:w-[92%] xs:w-[90%] mx-auto flex flex-col relative">
                <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl">
                    {{ userProfile.first_name }} {{ userProfile.last_name }}
                </h1>
                <p class="mt-2">Hello everyone, welcome to my account</p>
            </div>
            <div class="w-[90%] sm:w-[80%] mx-auto flex flex-col">
                <!-- Detail -->
                <div class="w-full  flex flex-col justify-center gap-4">
                    <div class="w-full">
                        <dl class="text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                            <div class="flex flex-row py-3">
                                <el-icon class="m-2">
                                    <Message />
                                </el-icon>
                                <dt class="mb-1 text-lg mr-20">Email:</dt>
                                <dd class="text-lg font-semibold">{{ userProfile.email }}</dd>
                            </div>
                            <div class="flex flex-row  ">
                                <el-icon class="m-2">
                                    <Phone />
                                </el-icon>
                                <dt class="mb-1 text-lg mr-20">Phone:</dt>
                                <dd class="text-lg font-semibold">{{ userProfile.phone }}</dd>
                            </div>
                            <div class="flex flex-row py-3 mr-20">
                                <el-icon class="m-2">
                                    <Location />
                                </el-icon>
                                <dt class="mb-1 text-lg mr-20 ">Region:</dt>
                                <dd class="text-lg font-semibold">Phnom Penh</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
import { EditPen, Message, Phone, Location } from '@element-plus/icons-vue'
import axiosInstance from '@/plugins/axios'
import { ref, onMounted } from 'vue'
import { useAuthStore } from '@/stores/auth-store'
const authStore = useAuthStore()
const roles = ref<any[]>()
const userProfile = ref<{
    first_name: string,
    last_name: string,
    email: string,
    phone: string,
    profile: string
}>({
    first_name: "",
    last_name: "",
    email: "",
    phone: "",
    profile: ""
})

onMounted(async () => {
    try {
        await authStore.fetchUser()
        //   roles.value = authStore.user.roles
        userProfile.value = authStore.user.data
    } catch (error) {
        console.error('Error fetching auth:', error)
    }
})
</script>

<style scoped>
@media (min-width: 640px) {
    .sm\\:-mt-24 {
        margin-top: -6rem;
    }
}

@media (min-width: 1024px) {
    .lg\\:-mt-32 {
        margin-top: -8rem;
    }
}
</style>
