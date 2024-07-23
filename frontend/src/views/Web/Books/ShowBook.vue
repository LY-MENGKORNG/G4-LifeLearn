<template>
	<WebLayout>
		<div class="flex bg-gay-200  h-64 p-6">
			<a v-if="book.title != ''" :href="book.file" target="_blank" class="flex gap-3 p-6 mx-auto border-1 border-green-300 rounded-lg">
				<div class="rounded-md flex items-center justify-center overflow-hidden">
					<img :src="book.cover" :alt="book.title" class="rounded-md flex-1" />
				</div>	
				<div class="flex flex-col justify-between">
					<div class=" flex flex-col gap-2">
						<h3 class="text-xl font-medium">{{ book.title }}</h3>
						<p>{{ book.description }}</p>
					</div>
					<div class="flex justify-between">
						<span>{{ book.published_date }}</span>
						<span v-if="book.price != '0'" class="p-1  px-3 rounded-md bg-green-200">${{ book.price }}</span>
						<span v-else class="py-[2px] px-3 rounded-md bg-green-300"> Free </span>
					</div>
				</div>
			</a>
		</div>
	</WebLayout>
</template>

<script setup lang="ts">
import router from '@/router'
import { useBookStore } from '@/stores/book-store'
import { onMounted, ref } from 'vue'

const bookStore = useBookStore()
const book = ref({
	title: '',
	cover: '',
	description: '',
	published_date: '',
	price: '',
	file: ''
})
onMounted(async () => {
	await bookStore.fetchOneBook(router.router.currentRoute.value.params.id)
	book.value = bookStore.book
	console.log(book.value)
})
</script>