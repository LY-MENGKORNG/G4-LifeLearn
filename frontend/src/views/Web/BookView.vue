<template>
	<WebLayout>
		<div class="grid xl:grid-cols-4 lg:grid-cols-3 md:grid-col-2 p-5 gap-4">
			<BookCard
				v-for="book in booklist"
				:key="book.id"
				:title="book.title"
				:description="book.description"
				:price="book.price"
				:author="book.author"
				:cover="book.cover"
				:published_date="book.published_date"
				:detail="'book/'+book.id"
			/>

		</div>
	</WebLayout>
</template>

<script setup lang="ts">
import BookCard from '@/Components/Common/Card/BookCard.vue'
import WebLayout from '@/Layouts/Web/WebLayout.vue'
import { ref, onMounted } from 'vue'
import { useBookStore } from '@/stores/book-store'

const booklist = ref<any[]>([])
const bookStore = useBookStore()

onMounted(async () => {
	await bookStore.fetchBooks()
	booklist.value = bookStore.books
})
</script> 
