<template>
  <SystemLayout>
    <div class="flex flex-row h-100%">
      <div class="w-full grid grid-row-3 gap-3 px-20 py-8">
        <div class="bg-pink-900 pl-8 text-white flex justify-between rounded-xl">
          <h1 class="self-end text-4xl pb-8">PHP</h1>
          <img
            class="top-16 left-80 w-80 h-60 object-cover shadow-md rounded-xl"
            src="https://img.freepik.com/free-vector/hand-drawn-flat-design-stack-books-illustration_23-2149341898.jpg"
            alt="Course Image"
          />
        </div>
        <div class="homework flex flex-row space-x-10 rounded-xl">
          <div class="view bg-white space-y-5 h-fit p-4 rounded-xl">
            <h4 class="font-bold">Upcoming</h4>
            <p>Woohoo, no work due soon!</p>
            <h5
              @click="toggleVisibility"
              class="flex justify-end font-bold text-blue-500 cursor-pointer"
            >
              View all
            </h5>
            <router-link to="/system/material"><h6 v-if="isVisible">Stream</h6></router-link>
            <router-link to="/system/people"
              ><h6 v-if="isVisible" class="mt-4">People</h6></router-link
            >
            <router-link to="/system/missing"
              ><h6 v-if="isVisible" class="mt-4">Missing</h6></router-link
            >
            <router-link to="/system/done"><h6 v-if="isVisible" class="mt-4">Done</h6></router-link>
          </div>
          <div class="bg-white border-2 shadow-md relative rounded-xl">
            <div class="bg-gray-10 flex items-center space-x-3">
              <div class="px-5 py-4 mr-8 space-x-7 space-y-4 grid gap-3">
                <div class="flex justify-content-between">
                  <h2 class="text-xl font-bold">Resources</h2>
                  <router-link to="/system/liststudent">
                    <el-button class="btn btn-primary">➕ Add Students</el-button>
                  </router-link>
                </div>
                <router-link to="/system/lesson">
                  <div
                    class="flex flex-row card bg-white p-4 border-1 border-solid border-black space-x-8"
                  >
                    <div>
                      <h4>Materail</h4>
                      <p>Here you will find all necessary materials for upcoming lesson</p>
                    </div>
                    <button class="btn p-2 border-1 border-solid border-black">Get Started</button>
                  </div>
                </router-link>
                <router-link to="/system/homework">
                  <div
                    class="flex flex-row card bg-white p-4 border-1 border-solid border-black space-x-8"
                  >
                    <div>
                      <h4>HomeWork</h4>
                      <p>Here you will find all necessary materials for upcoming lesson</p>
                    </div>
                    <button class="btn p-2 border-1 border-solid border-black">Get Started</button>
                  </div>
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </SystemLayout>
</template>

<script setup lang="ts">
import { RouterLink } from 'vue-router'
import { ref } from 'vue'
import SystemLayout from '@/Layouts/System/SystemLayout.vue'
const isVisible = ref(false)

function toggleVisibility() {
  isVisible.value = !isVisible.value
}
</script>
