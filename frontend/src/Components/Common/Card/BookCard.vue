<template>
	<router-link :to="detail" class="flex flex-col gap-1">
		<div class="h-60 overflow-hidden flex">
			<img class="w-full" :src="cover" alt="" />
		</div>
		<h3 class="text-xl">{{ title }}</h3>
		<p>{{ description }}</p>
		<div class="flex justify-between">
			<span> {{ author }}</span>
			<span> ${{ price }}</span>
		</div>
	</router-link>
</template>

<script setup lang="ts">
defineProps<{
	title: string
	description: string
	author: string
	price: number
	published_date: string
	cover: string
    detail: any 
}>()
</script>
