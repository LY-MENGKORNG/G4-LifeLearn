<template>
	<div id="app" class="min-h-screen flex items-center justify-center bg-background text-foreground">
		<div class="max-w-lg w-full bg-white p-6 rounded-lg shadow-md">
			<div class="text-center flex flex-col gap-2">
				<h1 class="text-2xl font-bold mb-2">Payment Successful!</h1>
				<p class="text-muted-foreground">
					Thank you for your purchase. Your transaction has been completed successfully.
				</p>
				<span class="text-3xl">🎉</span>
				<el-button type="success" @click="goToDashboard">Go to Dashboard</el-button>
			</div>
		</div>
	</div>
</template>

<script setup lang="ts">
import axiosInstance from '@/plugins/axios'
import router from '@/router'
import { useAuthStore } from '@/stores/auth-store'

const authStore = useAuthStore()

const createSystem = () => {
	const response = axiosInstance.post('/system-create', {
		permissions: authStore.user.permissions
	})
	console.log(response)
	return false
}
const goToDashboard = () => {
	console.log('hi')
	createSystem()
	router.router.push('/system/login')
}
</script>


<style scoped>
:root {
	--background: #f8f9fa;
	--foreground: #212529;
	--primary: #0d6efd;
	--primary-foreground: #ffffff;
	--muted-foreground: #6c757d;
	--card: #ffffff;
	--card-foreground: #212529;
}
@media (prefers-color-scheme: dark) {
	:root {
		--background: #121212;
		--foreground: #e0e0e0;
		--primary: #0d6efd;
		--primary-foreground: #ffffff;
		--muted-foreground: #adb5bd;
		--card: #1e1e1e;
		--card-foreground: #e0e0e0;
	}
}
body {
	background-color: var(--background);
	color: var(--foreground);
}

.text-muted-foreground {
	color: var(--muted-foreground);
}
.bg-card {
	background-color: var(--card);
}
.text-foreground {
	color: var(--foreground);
}
.hover\:bg-primary\/80:hover {
	background-color: var(--primary);
	opacity: 0.8;
}
</style>