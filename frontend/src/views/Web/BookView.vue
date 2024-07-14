<template>
  <WebLayout>
    <div class="max-w-md mx-auto mb-3">
      <div class="flex relative items-center">
        <div class="el-input el-input--medium el-input--suffix">
          <div class="el-input__wrapper" tabindex="-1">
            <input 
              class="el-input__inner" 
              type="text" 
              autocomplete="off" 
              tabindex="0" 
              placeholder="Search about book..." 
              id="el-id-3283-0"
            >
            <span class="el-input__suffix">
              <span class="el-input__suffix-inner">
                <i class="el-icon el-input__icon">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                    <path fill="currentColor"
                      d="m795.904 750.72 124.992 124.928a32 32 0 0 1-45.248 45.248L750.656 795.904a416 416 0 1 1 45.248-45.248zM480 832a352 352 0 1 0 0-704 352 352 0 0 0 0 704">
                    </path>
                  </svg>
                </i>
              </span>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-gray-100 rounded-2xl pl-12">
      <h3 class="text-teal-400 pt-2">All Books</h3>

      <div class="book flex flex-wrap gap-5">
        <div 
          v-for="book in booklist" 
          :key="book.id"
          class="book-card rounded-lg bg-white border text-center shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface mt-5 max-w-[18rem] max-h-[25rem] overflow-hidden hover:transform hover:-translate-y-5 transition duration-300 ease-in-out"
        > 
          <img 
            @click="addToMyLearn(book)"
            :src="'https://i.pinimg.com/564x/f8/e7/48/f8e748bdcffbf3eeb3b2d07f08d96bda.jpg'" 
            alt="Book Cover"
            class="w-full h-[200px] object-cover rounded-t-lg cursor-pointer"
          >
          <BookCard :title="book.title" :author="book.author" :price="book.price" />
        </div>
      </div>
    </div>
  </WebLayout>
</template>

<script setup lang="ts">
import BookCard from "@/Components/Common/Card/BookCard.vue";
import WebLayout from '@/Layouts/Web/WebLayout.vue';
import axiosInstance from '@/plugins/axios';
import { useBookStore } from '@/stores/store-book.ts';
import { ref, onMounted } from 'vue';

const booklist = ref([]);
const store = useBookStore();

const addToMyLearn = (book) => {
  store.addToMyLearn(book);

};

onMounted(async () => {
  try {
    const { data } = await axiosInstance.get('/books');
    booklist.value = data.data;
  } catch (error) {
    console.error('Error fetching books:', error);
  }
});
</script>

