<template>
	<li class="flex justify-between gap-x-6 py-2 px-3 border border-b-2 hover:bg-slate-100 transition-all">
		<div class="flex min-w-0 gap-x-4">
			<img class="h-12 w-12 flex-none rounded-full bg-gray-50" :src="profile" alt="" />
			<div class="min-w-0 flex-auto">
				<p class="text-sm font-semibold leading-6 text-gray-900">{{ fullName }}</p>
				<p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ email }}</p>
			</div>
		</div>
		<div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
			<p class="text-sm leading-6 text-gray-900" v-for="role in roles" :key="role.name">
				{{ role.name }}
			</p>
			<p v-if="lastSeen" class="mt-1 text-xs leading-5 text-gray-500">
				Last seen <time datetime="2023-01-23T13:23Z">{{ lastSeen  }}</time>
			</p>
			<div v-else class="mt-1 flex items-center gap-x-1.5">
				<div class="flex-none rounded-full bg-emerald-500/20 p-1">
					<div class="h-1.5 w-1.5 rounded-full bg-emerald-500" />
				</div>
				<p class="text-xs leading-5 text-gray-500">Online</p>
			</div>
		</div>
	</li>
</template>

<script setup lang="ts">

defineProps<{
    profile: string,
    fullName: string,
    email: string,
    roles: any,
    lastSeen: string 
}>()
</script>

<style scoped>
</style>