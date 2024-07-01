<!-- src/components/Login.vue -->

<script setup lang="ts">
import axiosInstance from '@/plugins/axios'
import * as yup from 'yup'
import { useRouter } from 'vue-router'
</script>

<template>
  <div
    class="flex justify-center max-w-4xl shadow-md mx-auto items-center min-h-screen bg-gray-100"
  >
    <el-card @submit="onSubmit" class="flex-1 p-10">
      <h2 class="text-2xl font-bold mb-6 text-end">Logging out</h2>
      <p>Do you want to logout?</p>
      <el-button
        :disabled="isSubmitting"
        native-type="submit"
        class="w-full mt-3 bg-teal-500 hover:bg-teal-500 active:bg-teal-600 text-white"
        >Logout</el-button
      >
    </el-card>
  </div>
</template>

<style scoped>
.min-h-screen {
  min-height: 100vh;
}
</style>
