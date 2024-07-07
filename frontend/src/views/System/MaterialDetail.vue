<template>
    <SystemLayout>
        <div class="flex flex-row h-100%">
    <div class="w-full grid grid-row-3 gap-3 px-20 py-8">
      <div class="bg-red-500 pl-8 text-white flex justify-between rounded-xl">
        <h1 class="self-end text-4xl pb-8">Vue JS</h1>
        <img
          class="top-16 left-80 w-80 h-60 object-cover shadow-md rounded-xl"
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrFaGL9bxaF74jGn2JbEdFPDsb0DFtmV1phg&s"
          alt="Course Image"
        />
      </div>
      <div class="bg-white border-2 shadow-md relative rounded-xl">
    <div class="bg-gray-10 flex items-center space-x-3">
      <div class="px-20 py-3 mr-8 space-x-7 grid gap-3"> 
        <h2 class="text-xl font-bold">Resources</h2>
        <div class="flex flex-row card bg-white p-4 border-1 border-solid border-black space-x-40">
          <div>
            <h3>Materail</h3>
            <p>Here you will find all necessary materials for upcoming lesson</p>
          </div>
          <button class="btn p-2 border-1 border-solid border-black">Get Started</button>
        </div>
        <div class="flex flex-row card bg-white p-4 border-1 border-solid border-black space-x-40">
          <div>
            <h3>HomeWork</h3>
            <p>Here you will find all necessary materials for upcoming lesson</p>
          </div>
          <button class="btn p-2 border-1 border-solid border-black">Get Started</button>
        </div>
      </div>
    </div>
  </div>
    </div>
  </div>
    </SystemLayout>
</template>

<script setup lang="ts">
import SystemLayout from '@/Layouts/System/SystemLayout.vue';

</script>