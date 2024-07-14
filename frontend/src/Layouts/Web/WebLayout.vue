<script setup lang="ts">
import WebNavbar from './WebNavbar.vue'
import WebFooter from './WebFooter.vue'
import WebHeaderMenu from './WebHeaderMenu.vue'

import { onMounted, ref } from 'vue'
import { useAuthStore } from '@/stores/auth-store'
const authStore = useAuthStore()

const userProfile = ref()
const profile = ref();

onMounted(async () => {
	await authStore.fetchUser()
	userProfile.value = authStore.user
	profile.value = userProfile.value.data.profile;
})
</script>

<template>
	<div class="common-layout bg-white min-h-screen">
		<el-container class="flex flex-col justify-between relative">
			<WebNavbar :src="profile"></WebNavbar>
			<web-header-menu />
			<el-main class="p-0">
				<slot></slot>
			</el-main>
			<WebFooter></WebFooter>
		</el-container>
	</div>
</template>