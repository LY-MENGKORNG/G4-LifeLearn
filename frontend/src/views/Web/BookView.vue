<template>
  <WebLayout>
    <div class="max-w-md mx-auto mb-3">
      <div class="flex relative items-center">
        <div class="el-input el-input--medium el-input--suffix">
          <div class="el-input__wrapper" tabindex="-1">
            <input class="el-input__inner" type="text" autocomplete="off" tabindex="0" placeholder="Search about book..." id="el-id-3283-0">
            <span class="el-input__suffix">
              <span class="el-input__suffix-inner">
                <i class="el-icon el-input__icon">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                    <path fill="currentColor" d="m795.904 750.72 124.992 124.928a32 32 0 0 1-45.248 45.248L750.656 795.904a416 416 0 1 1 45.248-45.248zM480 832a352 352 0 1 0 0-704 352 352 0 0 0 0 704"></path>
                  </svg>
                </i>
              </span>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-gray-100 rounded-2xl pl-12">
      <h2 class="text-teal-400 pt-2">All Books</h2>
      <div class="grid grid-cols-2 gap-4 md:grid-cols-7 lg:grid-cols-4 gap-x-1 gap-y-1">
        
        <div v-for="book in booklist" :key="book.id" class="rounded-lg bg-white border text-center shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface mt-5 max-w-[18rem] max-h-[90rem] overflow-hidden hover:transform hover:-translate-y-5 transition duration-300 ease-in-out">
          {{ book.id }}
         
          <img @click="addToMyLearn(book)" :src="book.image_url || 'https://i.pinimg.com/564x/f8/e7/48/f8e748bdcffbf3eeb3b2d07f08d96bda.jpg'" alt="Book Cover" class="w-full h-[200px] object-cover rounded-t-lg cursor-pointer">
          <div class="p-6">
            <h5 class="mb-2 text-lg font-medium leading-tight text-start">{{ book.title }}</h5>
            <p class="mb-2 text-base text-start py-1 min-w-[18rem]"><b>Author:</b> {{ book.author }}</p>
            <p class="mb-2 text-base text-start py-1 min-w-[18rem]"><b>Price:</b> {{ book.price }} $</p>
            <div class="flex justify-between">
              <div class="mb-2">
                <span class="">
                  <img
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAB+ElEQVR4nO2WzY4MYRSGeyxkQrCzE67DCguZjYSNnyUSBokbIPlWUu9zqoM2GcE1WDC7yXABxD0MC0PYYMNkJCWn56ue6u7qv+mqITIn+TZ1ft7nnO9UpRqNXdu1f9FCCHuAS8ASsIb02+CLSa8kXQ4hzJbkzAJXgNdIXz3Hc016CVzwmmOJJ0lyDHhnkA05n4GzeY6ZnfNnw3KAt2maHh0pbluFVoFrzWbzSAhhb9uXJLcMPnQKS/eApCMivQdueqzneC4w78+j/9NAiLA59nbnSMvAgQFxPuq7BhuFDjdMulN2NW6tVusg0kqMfVN6Hal0sdB5qXhXfJKcQvpu8A04OSpe0qF8eql0vi8AWIpjvT6qWAHihJ9x4026EffhRRnAmjv93ho1md9/bPJjPx2suzOEsK9GgP1xx36VAay6U9LxugB8V/I96weQHka657UBSMsRYKHPmabpYZN+xC29WrW4L3cU/zlwz4D5PMjM5ioTN5vze4/N3R5Fer9KCK/RrrX5+j0YL0lShFhPk+TMFOKnJxavCqIo7gueZdnMRAWyLJsBWtuB6On8ycTi00BUJr4diJ6xP51avAtCejQMojbxcSB6xv6scvFhEDsmnpsLmLTY+VhtjX2xdvEuCFgo/HDW3/mAt+Oxnx0Xz82F/5p443+xP/gaRBj9vcfVAAAAAElFTkSuQmCC">
                </span>
              </div>
              <div class="mb-2">
                <router-link to="">
                  <el-button class="bg-teal-500 text-white font-bold py-2 px-3 hover:bg-teal-600">Buy</el-button>
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
   
    
  </WebLayout>
</template>

<script setup lang="ts">
import WebLayout from '@/Layouts/Web/WebLayout.vue';
import axiosInstance from '@/plugins/axios';
import { useBookStore } from '@/stores/store-book.ts';
import { ref, onMounted } from 'vue';

const booklist = ref([]);
const store = useBookStore();

const addToMyLearn = (book) => {
  store.addToMyLearn(book);
  // alert(`Added ${book.id} to your learning list.`);
}

onMounted(async () => {
  try {
    const { data } = await axiosInstance.get('/books');
    booklist.value = data.data;
  } catch (error) {
    console.error('Error fetching books:', error);
  }
});
</script>

<style scoped>
</style>
