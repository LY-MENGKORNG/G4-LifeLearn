<template>
	<el-progress
		:percentage="100"
		:format="format"
		:indeterminate="true"
		:duration="5"
		:text-inside="true"
	/>
</template>

<script setup lang="ts">
 const format = (percentage: number) => (percentage === 100 ? 'Full' : `${percentage}%`)
</script>
 