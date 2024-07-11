<script setup lang="ts">
defineProps<{
	carousels: { id: number; name: string, description?: string, image?: string }[]
}>()
</script>

<template>
	<el-carousel :interval="6000" height="300px" class="bg-gray-200">
		<el-carousel-item  class="flex" v-for="carousel in carousels" :key="carousel.id" 
		:style="'background-image: url( ' + carousel.image +');'">
			<div class="flex-1 p-5 flex gap-3 flex-col justify-end transition-all bg-slate-700/30 hover:bg-slate-700/40 text-white text-center">
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, molestias deleniti modi sunt fuga assumenda?</p>
				<h2 class="font-medium text-2xl">{{ carousel.name }}</h2>
			</div>
			<!-- <h3 text="2xl" justify="center">{{ carousel.name }}</h3> -->
		</el-carousel-item>
	</el-carousel>
</template>
  
<style scoped>

.el-carousel__item {
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
	background-position: center;
}

.el-carousel__item:nth-child(2n) {
	background-color: #002b66;
}

.el-carousel__item:nth-child(2n + 1) {
	background-color: #262f39;
}
</style>
  