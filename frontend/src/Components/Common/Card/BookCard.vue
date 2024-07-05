<template>
        <div
          class="block rounded-lg bg-white border text-center shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface max-w-[18rem] max-h-[90rem] overflow-hidden">
          <img src="https://i.pinimg.com/564x/f8/e7/48/f8e748bdcffbf3eeb3b2d07f08d96bda.jpg"
            class="w-full" alt="Book Cover">
          <div class="p-6">
            <h5 class="mb-2 text-lg font-medium leading-tight text-start">
              <b>Title: {{ title }}</b>
            </h5>
            <p class="mb-2 text-base text-start py-1 min-w-[18rem]">
              Author: {{ author }}</p>
            <!-- <p class="mb-2 text-base text-start py-1 min-w-[18rem]"> -->
            <!-- UserID: {{ book.user.first_name }}</p> -->
            <p class="mb-2 text-base text-start py-1 min-w-[18rem]">
              Published: {{ published_at }}</p>
            <p class="mb-2 text-base text-start py-1 min-w-[18rem]">
              Price: {{ price }} $</p>
            <div class="flex justify-between">
              <div class="mb-2">
                <span class="">
                  <img
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAB+ElEQVR4nO2WzY4MYRSGeyxkQrCzE67DCguZjYSNnyUSBokbIPlWUu9zqoM2GcE1WDC7yXABxD0MC0PYYMNkJCWn56ue6u7qv+mqITIn+TZ1ft7nnO9UpRqNXdu1f9FCCHuAS8ASsIb02+CLSa8kXQ4hzJbkzAJXgNdIXz3Hc016CVzwmmOJJ0lyDHhnkA05n4GzeY6ZnfNnw3KAt2maHh0pbluFVoFrzWbzSAhhb9uXJLcMPnQKS/eApCMivQdueqzneC4w78+j/9NAiLA59nbnSMvAgQFxPuq7BhuFDjdMulN2NW6tVusg0kqMfVN6Hal0sdB5qXhXfJKcQvpu8A04OSpe0qF8eql0vi8AWIpjvT6qWAHihJ9x4026EffhRRnAmjv93ho1md9/bPJjPx2suzOEsK9GgP1xx36VAay6U9LxugB8V/I96weQHka657UBSMsRYKHPmabpYZN+xC29WrW4L3cU/zlwz4D5PMjM5ioTN5vze4/N3R5Fer9KCK/RrrX5+j0YL0lShFhPk+TMFOKnJxavCqIo7gueZdnMRAWyLJsBWtuB6On8ycTi00BUJr4diJ6xP51avAtCejQMojbxcSB6xv6scvFhEDsmnpsLmLTY+VhtjX2xdvEuCFgo/HDW3/mAt+Oxnx0Xz82F/5p443+xP/gaRBj9vcfVAAAAAElFTkSuQmCC">
                </span>
              </div>
              <div class="mb-2">
                <router-link to="system/bookpayment">
                  <el-button class="bg-teal-500 text-white font-bold py-2 px-3 hover:bg-teal-500">Buy</el-button>
                </router-link>
              </div>
            </div>
          </div>
        </div>
</template>

<script setup lang="ts">
import { defineProps } from "vue"

const props = defineProps({
    booklist: Array,
    title: String,
    author: String,
    published_at: String,
    price: String
})
</script>
