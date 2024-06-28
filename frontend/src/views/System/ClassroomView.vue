<template>
    <SystemLayout>
    <div class="flex h-full w-auto">
    <div class="flex-1 h-full ">
    <div class="bg-gray-200 pr-10 py-2 border-r-0 border-l-0 border-t-0 border-b-1 border-solid border-gray-300 flex justify-end items-center space-x-4">
        <div class="relative">
            <el-icon class="mr-14 font-black" :size="26"
                @mouseover="showTooltip = true"
                @mouseleave="showTooltip = false"><Plus />
            </el-icon>
            <div v-if="showTooltip" class="absolute bg-gray-800 text-white text-3 p-2 rounded text- w-32 pr-0  0">
                Create or join a class
            </div>
        </div>
        <img class=" left-0 w-10 h-10 object-cover rounded-full shadow-md"
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT35Sk9mMEcBuooCRGNUylcYn-PR6IZhDHzvA&s"
          alt="Course Image"/>
    </div>
        <div class="scrollable-content">
          <router-link to="/system/material" class="flex flex-wrap">
            <CardView v-for="index in 8" :key="index" />
          </router-link>
        </div>
    </div>
  </div>
    </SystemLayout>
</template>

<script setup lang="ts">
import SystemLayout from '@/Layouts/System/SystemLayout.vue';
import CardView from './CardView.vue'
import { Plus } from '@element-plus/icons-vue';
import { ref } from 'vue';

const showTooltip = ref(false);
</script>

<style scoped>
.scrollable-content {
  height: calc(100vh - 56px); /* Adjust 56px to match your top bar height */
  overflow-y: auto;
}
</style>