<template>
  <div
    class="flex justify-between space-x-8 items-center bg-white border-1 px-6 py-3 rounded-xl border-gray-300"
  >
    <div class="flex items-center space-x-8">
      <button class="bg-blue-500 w-10 h-10 rounded-full">
        <el-icon :size="26" color="white">
          <DocumentRemove />
        </el-icon>
      </button>
      <div>
        <p>{{ quiz.title }}</p>
        <p class="text-base text-gray-400">{{ quiz.topics }}</p>
      </div>
    </div>
    <p class="text-base text-gray-400">{{ quiz.deadline }}</p>
  </div>
</template>

<script setup lang="ts">
import { DocumentRemove } from "@element-plus/icons-vue";
const props = defineProps<{
  quiz: { title: string; topics: string; deadline: string; fields: string };
}>();
console.log(props);
</script>
