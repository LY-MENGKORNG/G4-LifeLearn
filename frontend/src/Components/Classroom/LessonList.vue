<template>
    <div class="flex justify-between space-x-8 items-center bg-white border-1 px-6 py-2 rounded-xl border-gray-300">
      <div class="flex items-center space-x-8">
        <button class="bg-blue-500 w-14 h-14 rounded-full">
          <el-icon :size="26" color="white">
            <DocumentRemove />
          </el-icon>
        </button>
        <p>PHP</p>
      </div>
      12/03/2024
    </div>
  </template>
  <script setup lang="ts">
  import { DocumentRemove } from '@element-plus/icons-vue'
  </script>