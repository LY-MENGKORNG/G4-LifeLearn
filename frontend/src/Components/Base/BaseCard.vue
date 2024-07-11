<template>
	<div
		class="relative flex flex-col h-80 max-w-80 gap-2 overflow-hidden rounded-2xl border-1 hover:border-2 border-teal-300 hover:shadow-sm hover:shadow-teal-300/35 transition-all"
	>
		<div class="flex h-[55%] flex-col border-b-1 border-teal-300 p-3">
            <div class="mx-auto my-2 p-1 rounded-full border border-teal-200">
                <component class="w-6 h-6" :is="icon">Something</component> 
            </div>
            <div class="text-center">
                <h3 class="text-xl font-medium">{{ top.title }}</h3>
                <p class="text-slate-500">{{ top.description }}</p>

            </div>
		</div>
		<div class="flex text-center flex-col gap-3 p-3 h-[45%]">
			<span class="text-lg font-medium">{{ bottom.title }}</span>
			<p class="text-slate-500">{{ bottom.description }}</p>
		</div>
	</div>
</template>

<script setup lang="ts">

const props = defineProps<{
    icon?: Object,
	top: { title: string; description: string },
	bottom: { title: string; description: string }, 
}>()
</script>
 