<template>
  <SystemLayout>
    <div class="flex flex-row h-100%">
      <div class="w-100% grid gap-3 px-20 py-8">
        <div class="bg-red-900 pl-8 text-white flex justify-between rounded-xl">
          <h1 class="self-end text-4xl pb-8">PHP</h1>
          <img
            class="top-16 left-80 w-80 h-60 object-cover shadow-md rounded-xl"
            src="https://img.freepik.com/free-vector/hand-drawn-flat-design-stack-books-illustration_23-2149341898.jpg"
            alt="Course Image"
          />
        </div>
        <div class="homework flex flex-row space-x-5 rounded-xl">
          <div class="view bg-white space-y-5 h-fit w-81 p-4 rounded-xl">
            <h4 class="font-bold ">Upcoming</h4>
            <p>Woohoo, no work due soon!</p>
            <h5 @click="toggleVisibility" class="flex justify-end font-bold text-blue-500 cursor-pointer">View all</h5>
            <router-link to="/system/material"><h6 v-if="isVisible">Stream</h6></router-link>
            <router-link to="/system/peopl"><h6 v-if="isVisible" class="mt-4">People</h6></router-link>
            <router-link to="/system/missing"><h6 v-if="isVisible" class="mt-4">Missing</h6></router-link>
            <router-link to="/system/done"><h6 v-if="isVisible" class="mt-4">Done</h6></router-link>
          </div>
          <div class="scrollable-content border-2 rounded-xl w-full space-y-3 px-3">
            <StudentView class=" bg-white py-3 px-6 rounded-xl"/>
            <LessonList class="space-y-3" v-for="index in 8" :key="index"/>
          </div>
        </div>
      </div>
    </div>
  </SystemLayout>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import SystemLayout from '@/Layouts/System/SystemLayout.vue'
import LessonList from '@/Components/Classroom/LessonList.vue';
import ListStudent from '@Components/Classroom/ListStudent.vue';
const isVisible = ref(false)

function toggleVisibility () {
  isVisible.value = !isVisible.value
}
</script>
<style scoped>
.scrollable-content {
  height: calc(100vh - 56px);
  overflow-y: auto;
}
</style>