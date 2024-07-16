<template>
	<el-avatar :src="Src" />
</template>

<script setup lang="ts">
import { defineProps } from 'vue'

defineProps({
	Src: String
})
</script>