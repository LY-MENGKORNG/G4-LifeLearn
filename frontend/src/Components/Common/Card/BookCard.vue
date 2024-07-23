<template> 
	<router-link :to="detail"
		class="mx-auto bg-card text-card-foreground rounded-md shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-101">
		<img class="w-full h-48 object-cover" :src="cover" alt="Book cover image" />
		<div class="p-6">
			<h2 class="text-2xl font-bold mb-2">{{ title }}</h2>
			<p class="text-muted-foreground mb-4 italic">By <span class="font-bold">{{ author }}</span></p>
			<p class="text-base leading-relaxed mb-4 text-balance h-9">{{ description }}</p>

			<div class="mt-4 flex justify-between items-center" v-if="price != 0">
				<span class="text-primary font-bold text-lg">${{ price }}</span>
				<button
					class="bg-green-500 text-white hover:bg-green-700/80 px-6 py-2 rounded-full shadow-lg transition-colors duration-300">Buy
					Now</button>
			</div>
			<div class="mt-4 flex justify-between items-center" v-else>
				<span class="text-primary font-light rounded-full bg-green-100/30 px-2 py-1">Free</span>
				<button
					class="bg-green-500 text-white hover:bg-green-400 px-6 py-2 rounded-full shadow-lg transition-colors duration-300">
					Read Now</button>
			</div>
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
