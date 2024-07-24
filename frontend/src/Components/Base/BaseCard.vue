<template>
	<div
		:class="'relative flex flex-col h-auto max-w-80 gap-2 overflow-hidden rounded-2xl transform transition-transform duration-300 hover:scale-101 '+ Class"
	>
		<slot></slot>
	</div>
</template>

<script lang="ts" setup>

defineProps<{
	Class?: string
}>()
</script>
