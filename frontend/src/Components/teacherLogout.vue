<template>
  <WebLayout>
    <div class="flex justify-center max-w-4xl shadow-md mx-auto items-center bg-gray-100 mt-5">
      <el-container class="flex m-auto">
        <!-- Image Section -->
        <el-card class="flex-1 p-10">
          <img
            src="https://tandur.co.id/assets_portal/assets/images/login.png"
            class="w-full justify-center mx-auto"
            alt="Teacher image"
          />
        </el-card>

        <!-- Form Section -->
        <el-form class="flex-1 p-10 text-start">
          <h2 class="text-2xl font-bold mb-6">Logout</h2>
          <p>Don't have an account? <router-link to="/register">Create now</router-link></p>
          <el-form-item class="mt-5">
            <label for="email">Email</label>
            <el-input id="email" v-model="email" />
          </el-form-item>
          <el-form-item class="mt-2">
            <label for="password" show-password>Password</label>
            <el-input id="password" type="password" v-model="password" />
          </el-form-item>
          <el-button
            native-type="submit"
            class="w-full mt-3 bg-teal-500 hover:bg-teal-500 active:bg-teal-600 text-white"
            >Sign In</el-button
          >
        </el-form>
      </el-container>
    </div>
  </WebLayout>
</template>
  
  <script setup lang="ts">
import WebLayout from '@/Layouts/Web/WebLayout.vue'
</script>
  