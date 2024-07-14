<template>
	<div
		:class="'relative flex flex-col h-auto max-w-80 gap-2 overflow-hidden rounded-2xl transition-all '+ Class"
	>
		<slot></slot>
	</div>
</template>

<script lang="ts" setup>

defineProps<{
	Class?: string
}>()
</script>
