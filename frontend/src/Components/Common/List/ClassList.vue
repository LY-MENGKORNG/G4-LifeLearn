<template>
	<li class="flex justify-between gap-x-6 py-2 px-3 border border-b-2 hover:bg-slate-100 transition-all">
		<div class="flex min-w-0 gap-x-4">
			 {{name}}
		</div>
		<div class="flex gap-2">
			<el-button type="warning" :icon="Edit" circle /> 
			<el-button type="danger" :icon="Delete" circle /> 
		</div>
	</li>
</template>

<script setup lang="ts">
import { Edit, Delete } from '@element-plus/icons-vue'

defineProps<{
    name: string
}>()
</script>

<style scoped>
</style>