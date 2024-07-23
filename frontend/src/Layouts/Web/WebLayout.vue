<script setup lang="ts">
import WebNavbar from './WebNavbar.vue'
import WebFooter from './WebFooter.vue'
import WebHeaderMenu from './WebHeaderMenu.vue'

import { onMounted, ref,  } from 'vue'
import { useAuthStore } from '@/stores/auth-store'
import router from '@/router'
import MainProgress from '@/Components/Common/progress/MainProgress.vue'
const authStore = useAuthStore()

const isLogin = ref<boolean>(false)
const isLoading = ref<boolean>(true)
setTimeout(() => {
	isLoading.value = false
}, 2000);

const userProfile = ref()
const profile = ref()

onMounted(() => {
	userProfile.value = authStore.user
	profile.value = userProfile.value.data.profile
	isLogin.value = userProfile.value.isAuthenticated
})
</script>

<template>
	<div class="common-layout bg-white min-h-screen">
		<el-container class="flex flex-col justify-between relative">
			<WebNavbar :src="profile"></WebNavbar>
			<MainProgress  v-if="isLoading" />
			<WebHeaderMenu v-if="isLogin" />
			<main class="p-0">
				<slot></slot>
			</main>
			<WebFooter></WebFooter>
		</el-container>
	</div>
</template>