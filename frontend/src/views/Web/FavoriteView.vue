<template>
  <WebLayout>
    <head>
      <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      />
    </head>

    <header class="relative h-[400px] overflow-hidden">
      <img
        src="https://static.vecteezy.com/system/resources/thumbnails/026/858/211/small_2x/of-a-stack-of-books-with-a-delicate-egg-perched-on-top-with-copy-space-free-photo.jpg"
        alt="Header Background Image"
        class="absolute inset-0 w-full h-full object-cover bg-black/60 bg-fixed rounded-xl"
      />
      <div
        class="absolute bottom-0 left-0 right-0 top-20 h-full w-full flex items-start justify-end"
      >
        <div class="text-start text-white md:px-12">
          <h1 class="text-5xl font-bold py-2">A book is a dream </h1>
          <h1 class="text-5xl font-bold">you hold in your hands.</h1>
        </div>
      </div>
    </header>

    <div class="title">
      <h3 class="mt-5 text-center text-teal-400">All Favorite Books</h3>
      <p class="text-center text-gray-400">
        A favorite book is a friend that never fails to inspire, comfort, and enlighten us,
        reminding us of who we are and what we aspire to be.
      </p>
    </div>

    <div class="favourite flex flex-wrap g-5 gap-x-12 gap-y-6">
      <div
        class="block rounded-lg bg-white border text-center shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface mt-5 max-w-[18rem] max-h-[21rem] overflow-hidden"
      >
        <img
          src="https://rochizalani.com/wp-content/uploads/2021/04/psychology-of-money.jpg"
          alt="Description of image"
          class="w-full h-[200px] object-cover rounded-t-lg"
        />
        <div class="p-6">
          <h5 class="mb-2 text-lg font-medium leading-tight text-start">
            <b>The Psychology of Money</b>
          </h5>
          <p class="mb-2 text-base text-start py-1 min-w-[18rem]">
            Magan Housal
            <span class="text-yellow-400 ml-10">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </span>
          </p>
        </div>
      </div>
      <div
        class="block rounded-lg bg-white border text-center shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface mt-5 max-w-[18rem] max-h-[21rem] overflow-hidden"
      >
        <img
          src="https://www.bookmarked.id/cdn/shop/products/CompanyofOne2NEW_600x600_crop_center.jpg?v=1612547429"
          alt="Description of image"
          class="w-full h-[200px] object-cover rounded-t-lg"
        />
        <div class="p-6">
          <h5 class="mb-2 text-lg font-medium leading-tight text-start">
            <b>Company of One</b>
          </h5>
          <p class="mb-2 text-base text-start py-1 min-w-[18rem]">
            Paul Jarvis
            <span class="text-yellow-400 ml-10">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </span>
          </p>
        </div>
      </div>
      <div
        class="block rounded-lg bg-white border text-center shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface mt-5 max-w-[18rem] max-h-[21rem] overflow-hidden"
      >
        <img
          src="https://source.boomplaymusic.com/group10/M00/09/23/5a1ece70ea2a4ddeac1422b542ee655c_320_320.jpg"
          alt="Description of image"
          class="w-full h-[200px] object-cover rounded-t-lg"
        />
        <div class="p-6">
          <h5 class="mb-2 text-lg font-medium leading-tight text-start">
            <b>How Innovation Works</b>
          </h5>
          <p class="mb-2 text-base text-start py-1 min-w-[18rem]">
            Matt Ridley
            <span class="text-yellow-400 ml-10">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </span>
          </p>
        </div>
      </div>
      <div
        class="block rounded-lg bg-white border text-center shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface mt-5 max-w-[18rem] max-h-[21rem] overflow-hidden"
      >
        <img
          src="https://peanutblossombookclub.com/wp-content/uploads/2023/10/bookclubbooks2020-10.jpg"
          alt="Description of image"
          class="w-full h-[200px] object-contain rounded-t-lg"
        />
        <div class="p-6">
          <h5 class="mb-2 text-lg font-medium leading-tight text-start">
            <b>The Bees</b>
          </h5>
          <p class="mb-2 text-base text-start py-1 min-w-[18rem]">
            Laline Puall
            <span class="text-yellow-400 ml-10">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </span>
          </p>
        </div>
      </div>
    </div>
  </WebLayout>
</template>

<script setup lang="ts">
import WebLayout from '@/Layouts/Web/WebLayout.vue'
</script>
