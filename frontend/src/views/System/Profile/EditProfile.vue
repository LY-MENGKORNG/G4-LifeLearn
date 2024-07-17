<template>
    <SystemLayout>
    <div class="flex justify-center">
        <form @submit.prevent="updateProfile()" class="shadow p-10 w-160">
            <div class="mb-3">
                <label for="first-name" class="form-label text-blue-500">First Name</label>
                <input type="text" class="form-control" id="first-name" v-model="userProfile.first_name" required />
            </div>
            <div class="mb-3">
                <label for="last-name" class="form-label text-blue-500">Last Name</label>
                <input type="text" class="form-control" id="last-name" v-model="userProfile.last_name" required />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label text-blue-500">Email</label>
                <input type="email" class="form-control" id="email" v-model="userProfile.email" required />
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label text-blue-500">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" v-model="userProfile.phone" required />
            </div>
            <div class="mb-3">
                <label for="profile" class="form-label text-blue-500">Phone Number</label>
                <input type="file" class="form-control" id="profile" />
            </div>
            <div class="space-x-10 flex justify-end">
                <button type="submit" class="btn btn-primary">Save</button>
                <router-link to="/system/view/profile">
                <button class="btn btn-danger">Cancel</button>
                </router-link>
            </div>
        </form>
    </div>
</SystemLayout>
</template>


<script setup lang="ts">
import { ElNotification } from 'element-plus';
import SystemLayout from "@/Layouts/System/SystemLayout.vue";
import { ref, onMounted } from "vue";
import { useAuthStore } from "@/stores/auth-store";
import router from '@/router';
import { RouterLink } from 'vue-router';

const authStore = useAuthStore();

const userProfile = ref<any>({
    first_name: '',
    last_name: '',
    email: '',
    phone: '',
    profile: []
})


onMounted(async () => {
    await authStore.fetchUser()
    userProfile.value = authStore.user.data;
})

const  updateProfile = async () => {
    try {
        await authStore.editPrfile(userProfile.value);
        openSuccess()

        setTimeout(() => {
            router.router.push('/system/view/profile')
        }, 100)
    }catch (error) {
        console.warn(error)
    }
}

const openSuccess = () => {
  ElNotification({
    title: 'Success',
    message: 'User updated successfully',
    type: 'success',
  })
}
</script>
