<template>
	<div class="demo-progress w-full">
		<el-progress :percentage="percentage" :color="customColor" />
	</div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const percentage = ref(100)
const customColor = ref('#409eff')

const customColors = [
	{ color: '#f56c6c', percentage: 20 },
	{ color: '#e6a23c', percentage: 40 },
	{ color: '#5cb87a', percentage: 60 },
	{ color: '#1989fa', percentage: 80 },
	{ color: '#6f7ad3', percentage: 100 }
] 
</script>


 <style scoped>
.demo-progress .el-progress--line {
	margin-bottom: 15px;
	max-width: 600px;
}
</style>