<template>
	<div>
		<el-avatar :src="Src" />
	</div>
</template>

<script setup lang="ts">
import { defineProps } from 'vue'

defineProps({
	Src: String
})
</script>
