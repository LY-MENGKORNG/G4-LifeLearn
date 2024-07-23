<template>
	<base-card Class="border-1 border-green-400 bg-[#f9f9f9]">
		<div class="flex h-[55%] flex-col border-b-1 border-green-400 p-3">
			<div class="mx-auto my-2 p-1 rounded-full border border-green-400">
				<component class="w-7 h-7 text-green-400" :is="icon">Something</component>
			</div>
			<div class="text-center">
				<h3 class="text-xl font-medium text-green-400">{{ top.title }}</h3>
				<p class="text-slate-500">{{ top.description }}</p>
			</div>
		</div>
		<div class="flex text-center flex-col gap-3 p-3 h-[45%]">
			<span class="text-lg font-medium text-green-400" >{{ bottom.title }}</span>
			<p class="text-slate-500">{{ bottom.description }}</p>
		</div>
	</base-card>
</template>

<script setup lang="ts">
import BaseCard from '@/Components/Base/BaseCard.vue'
const props = defineProps<{
	icon?: Object
	top: { title: string; description: string }
	bottom: { title: string; description: string }
}>()
</script>
 