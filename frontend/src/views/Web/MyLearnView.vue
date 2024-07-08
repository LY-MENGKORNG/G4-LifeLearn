<template>
  <WebLayout>

    <head>
      <!-- Other head elements -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    </head>

    <div class="p-10">
      <div class="title">
        <h1 class="text-black mb-0">Our Course</h1>
        <hr class="border-black mt-0 mb-2" />
      </div>

      <div class="grid  gap-6 grid-cols-4   gap-y-4">
        <div
          class="rounded-lg bg-white border text-center shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface mt-5 min-w-[20rem] min-h-[20rem] overflow-hidden hover:shadow-md hover:transform hover:-translate-y-5 transition duration-300 ease-in-out">
          <div class="border-b-2 text-xl bg-slate-200 border-neutral-100 px-6 py-3 dark:border-white/10 text-start">
            <b>Free Course</b>
          </div>
          <img src="https://i.pinimg.com/474x/28/29/fa/2829fae07922815947b194c4a022cfac.jpg" alt="Description of image"
            class="short-height-img w-full h-40 object-container" />
          <div class="p-6">
            <h5 class="mb-2 text-xl font-medium leading-tight text-start">
              <b>Python</b>
              <span class="text-yellow-400 ml-20">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </span>
            </h5>
            <p class="mb-2 text-base text-start py-1 min-w-[18rem]">
              Learn the basics of Python and in-demand programming languages.
            </p>
          </div>
        </div>
        <div
          class="rounded-lg bg-white border text-center shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface mt-5 min-w-[20rem] min-h-[20rem] overflow-hidden hover:shadow-md hover:transform hover:-translate-y-5 transition duration-300 ease-in-out">
          <div class="border-b-2 text-xl bg-slate-200 border-neutral-100 px-6 py-3 dark:border-white/10 text-start">
            <b>Free Course</b>
          </div>
          <img src="https://i.pinimg.com/474x/28/29/fa/2829fae07922815947b194c4a022cfac.jpg" alt="Description of image"
            class="short-height-img w-full h-40 object-container" />
          <div class="p-6">
            <h5 class="mb-2 text-xl font-medium leading-tight text-start">
              <b>Python</b>
              <span class="text-yellow-400 ml-20">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </span>
            </h5>
            <p class="mb-2 text-base text-start py-1 min-w-[18rem]">
              Learn the basics of Python and in-demand programming languages.
            </p>
          </div>
        </div>
        <div
          class="rounded-lg bg-white border text-center shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface mt-5 min-w-[20rem] min-h-[20rem] overflow-hidden hover:shadow-md hover:transform hover:-translate-y-5 transition duration-300 ease-in-out">
          <div class="border-b-2 text-xl bg-slate-200 border-neutral-100 px-6 py-3 dark:border-white/10 text-start">
            <b>Free Course</b>
          </div>
          <img src="https://i.pinimg.com/474x/28/29/fa/2829fae07922815947b194c4a022cfac.jpg" alt="Description of image"
            class="short-height-img w-full h-40 object-container" />
          <div class="p-6">
            <h5 class="mb-2 text-xl font-medium leading-tight text-start">
              <b>Python</b>
              <span class="text-yellow-400 ml-20">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </span>
            </h5>

            <p class="mb-2 text-base text-start py-1 min-w-[18rem]">
              Learn the basics of Python and in-demand programming languages.
            </p>
          </div>
        </div>
        <div
          class="rounded-lg bg-white border text-center shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface mt-5 max-w-[18rem] max-h-[25rem] overflow-hidden hover:shadow-md hover:transform hover:-translate-y-5 transition duration-300 ease-in-out">
          <div class="border-b-2 text-xl bg-slate-200 border-neutral-100 px-6 py-3 dark:border-white/10 text-start">
            <b>Free Course</b>
          </div>
          <img src="https://i.pinimg.com/474x/28/29/fa/2829fae07922815947b194c4a022cfac.jpg" alt="Description of image"
            class="short-height-img w-full h-40 object-container" />
          <div class="p-6">
            <h5 class="mb-2 text-xl font-medium leading-tight text-start">
              <b>Python</b>
              <span class="text-yellow-400 ml-20">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </span>
            </h5>
            <p class="mb-2 text-base text-start py-1 min-w-[18rem]">
              Learn the basics of Python and in-demand programming languages.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="my-learn">
      <h1 class="mt-5 text-center">All Books</h1>
      <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-5 gap-x-1 gap-y-1">
        <div
          v-for="storebook in stores" :key="storebook.id" class="rounded-lg bg-white border text-center shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface mt-5 max-w-[18rem] max-h-[21rem] overflow-hidden hover:transform hover:-translate-y-5 transition duration-300 ease-in-out">
          <img  :src="storebook.image_url || 'https://i.pinimg.com/564x/f8/e7/48/f8e748bdcffbf3eeb3b2d07f08d96bda.jpg'" alt="Description of image" class="w-full h-[200px] object-cover rounded-t-lg" />
          <div class="p-6">
            <h5 class="mb-2 text-lg font-medium leading-tight text-start">
              <b>{{storebook.title}}</b>
            </h5>
            <p class="mb-2 text-base text-start py-1 min-w-[18rem]">
              <b>Author:</b> {{ storebook.author }}
            </p>
            <p class="mb-2 text-base text-start py-1 min-w-[18rem]">
              <b>Price:</b> {{ storebook.price }} $
            </p>
          </div>
        </div>
        </div>
      </div>
  </WebLayout>
</template>

<script setup lang="ts">
import WebLayout from '@/Layouts/Web/WebLayout.vue'
import { useBookStore } from '@/stores/store-book.ts';
const store = useBookStore();
let stores=store.display;
</script>
