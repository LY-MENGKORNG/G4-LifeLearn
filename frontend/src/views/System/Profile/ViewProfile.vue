<template>
    <SystemLayout>
        <div class="flex w-full space-x-7 px-30">
            <div class="w-full ">
                <div class="space-y-7">
                    <div class="bg-teal-500 w-full h-52 pl-10 pt-34 rounded">
                        <SystemProfile class="absolute w-30 h-30 p-1" :src="userProfile.profile" />
                    </div>
                    <div class="flex justify-end">
                        <router-link to="/system/edit/profile">
                        <button class="bg-blue-500 text-xl text-white p-2 rounded shadow"><el-icon>
                                <EditPen />
                            </el-icon>Edite Profile</button></router-link>
                    </div>
                </div>
                <div class="space-y-2">
                    <h5 class="text-xl">{{ userProfile.first_name }} {{ userProfile.last_name }}</h5>
                    <!-- <div class="flex space-x-5 text-xl">
                        <p>date of birth: {{ userProfile.date_of_birth }}</p>
                        <p>|</p>
                        <p>Gender: {{ userProfile.male }}</p>
                    </div> -->
                </div>
                <div class="flex space-x-40 items-center pt-7">
                    <div class="space-y-9">
                        <div class="flex items-center space-x-2">
                            <el-icon :size="20">
                                <User />
                            </el-icon>
                            <p>Role :</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <el-icon :size="20">
                                <Message />
                            </el-icon>
                            <p>Email :</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <el-icon :size="20">
                                <Phone />
                            </el-icon>
                            <p>Contact :</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <el-icon :size="20">
                                <LocationInformation />
                            </el-icon>
                            <p>Region :</p>
                        </div>
                    </div>
                    <div class="space-y-7 text-xl items-center">
                        <p v-for="role in roles" :key="role.name">{{ role.name }}</p>
                        <p>{{ userProfile.email }}</p>
                        <p>{{ userProfile.phone }}</p>
                        <p>Khmer</p>
                    </div>
                </div>
            </div>
            <!-- <div class="space-y-7 text-xl items-center w-80 p-10 h-max bg-slate-300 border-1 rounded border-black ">
                <div class="flex items-center space-x-2"><el-icon :size="20">
                        <ShoppingCart />
                    </el-icon>
                    <p> My_products</p>
                </div>
                <p>Total products : 5</p>
                <div class="flex items-center space-x-2">
                    <p> Payment</p><el-button type="primary" size="medium">Pay</el-button>
                </div>
            </div> -->
        </div>

    </SystemLayout>

</template>

<script setup lang="ts">
import SystemLayout from '@/Layouts/System/SystemLayout.vue';
import SystemProfile from '@/Components/Common/Profile/SystemProfile.vue';
import { EditPen, User, Message, Phone, LocationInformation, ShoppingCart } from '@element-plus/icons-vue';
import { ref, onMounted } from 'vue';
import { useAuthStore } from '@/stores/auth-store';
import { RouterLink } from 'vue-router';

const authStore = useAuthStore()

const roles = ref<any[]>()
console.log(roles)
const userProfile = ref<{
    first_name: string,
    last_name: string,
    email: string,
    phone: string,
    profile: string
    male: string
    date_of_birth: string
}>({
    first_name: "",
    last_name: "",
    email: "",
    phone: "",
    profile: "",
    male: "",
    date_of_birth: ""
});

onMounted(async () => {
    try {
        await authStore.fetchUser()
        roles.value = authStore.user.roles;
        userProfile.value = authStore.user.data;
        console.log(userProfile.value);
    } catch (error) {
        console.error('Error fetching auth:', error);
    }
});
</script>