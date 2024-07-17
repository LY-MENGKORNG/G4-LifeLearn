<template>
	<base-card Class=" border border-green-300 bg-[#f9f9f9]">
		<div class="h-[40%] overflow-hidden">
			<img class="w-full" :src="course.cover" alt="Sunset in the mountains" />
		</div>
		<div class="flex-3">
			<div class="px-3 py-2">
				<div class="font-bold text-xl mb-2 text-[#42b883]">{{ course.title }}</div>
				<p class="text-gray-700 text-base">
					{{ course.description }}
				</p>
			</div>
			<div class="px-3 pt-4">
				<span
					class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"
					>#photography</span
				>
				<span
					class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"
					>#travel</span
				>
				<span
					class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"
					>#winter</span
				>
			</div>
		</div>
	</base-card>
</template>

<script setup lang="ts">
import BaseCard from '@/Components/Base/BaseCard.vue'

defineProps<{
	course: {
		title: string
		description: string
		cover: string
	}
}>()
</script>
