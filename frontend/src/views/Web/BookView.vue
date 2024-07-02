<template>
<<<<<<< HEAD
    <WebLayout>
        
    </WebLayout>
=======
  <WebLayout>
    <div class="max-w-md mx-auto mb-3">
      <div class="flex relative items-center">
        <div class="el-input el-input--medium el-input--suffix"><!-- input --><!-- prepend slot --><!--v-if-->
          <div class="el-input__wrapper" tabindex="-1"><!-- prefix slot --><!--v-if--><input class="el-input__inner"
              type="text" autocomplete="off" tabindex="0" placeholder="Search about book..." id="el-id-3283-0"><span
              class="el-input__suffix"><span class="el-input__suffix-inner"><i class="el-icon el-input__icon"><svg
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
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
    <div class=" bg-gray-100 rounded-2xl pl-12 ">
      <h3 class=" text-teal-400 pt-2">All Books</h3>
      <div class="book flex flex-wrap g-5 gap-x-12 gap-y-10">
        <div
          class="block rounded-lg bg-white border text-center shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface max-w-[18rem] max-h-[90rem] overflow-hidden"
          v-for="book in booklist" :key="book.id">
          <img :src="book.image_url || 'https://i.pinimg.com/564x/f8/e7/48/f8e748bdcffbf3eeb3b2d07f08d96bda.jpg'"
            class="w-full" alt="Book Cover">
          <div class="p-6">
            <h5 class="mb-2 text-lg font-medium leading-tight text-start">
              <b>Title: {{ book.title }}</b>
            </h5>
            <p class="mb-2 text-base text-start py-1 min-w-[18rem]">
              Author: {{ book.author }}</p>
            <!-- <p class="mb-2 text-base text-start py-1 min-w-[18rem]"> -->
              <!-- UserID: {{ book.user.first_name }}</p> -->
            <p class="mb-2 text-base text-start py-1 min-w-[18rem]">
              Published: {{ book.published_at }}</p>
            <p class="mb-2 text-base text-start py-1 min-w-[18rem]">
              Price: {{ book.price }} $</p>
            <span class="ml-50 text-end">
              <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAB+ElEQVR4nO2WzY4MYRSGeyxkQrCzE67DCguZjYSNnyUSBokbIPlWUu9zqoM2GcE1WDC7yXABxD0MC0PYYMNkJCWn56ue6u7qv+mqITIn+TZ1ft7nnO9UpRqNXdu1f9FCCHuAS8ASsIb02+CLSa8kXQ4hzJbkzAJXgNdIXz3Hc016CVzwmmOJJ0lyDHhnkA05n4GzeY6ZnfNnw3KAt2maHh0pbluFVoFrzWbzSAhhb9uXJLcMPnQKS/eApCMivQdueqzneC4w78+j/9NAiLA59nbnSMvAgQFxPuq7BhuFDjdMulN2NW6tVusg0kqMfVN6Hal0sdB5qXhXfJKcQvpu8A04OSpe0qF8eql0vi8AWIpjvT6qWAHihJ9x4026EffhRRnAmjv93ho1md9/bPJjPx2suzOEsK9GgP1xx36VAay6U9LxugB8V/I96weQHka657UBSMsRYKHPmabpYZN+xC29WrW4L3cU/zlwz4D5PMjM5ioTN5vze4/N3R5Fer9KCK/RrrX5+j0YL0lShFhPk+TMFOKnJxavCqIo7gueZdnMRAWyLJsBWtuB6On8ycTi00BUJr4diJ6xP51avAtCejQMojbxcSB6xv6scvFhEDsmnpsLmLTY+VhtjX2xdvEuCFgo/HDW3/mAt+Oxnx0Xz82F/5p443+xP/gaRBj9vcfVAAAAAElFTkSuQmCC">
            </span>
          </div>
        </div>
      </div>
    </div>

  </WebLayout>
>>>>>>> 03999ed74efd860dbd2f543593e63f6cf2b88717
</template>
<script setup lang="ts">
import WebLayout from "@/Layouts/Web/WebLayout.vue";
import axiosInstance from '@/plugins/axios';
import { ref, onMounted } from 'vue';

const booklist = ref([]);

onMounted(async () => {
  try {
    const { data } = await axiosInstance.get('/books');
    booklist.value = data.data; 
    // console.log(data.data); 
  } catch (error) {
    console.error('Error fetching books:', error);
  }
});
</script>
