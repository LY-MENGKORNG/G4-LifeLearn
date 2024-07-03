<template>
  <WebLayout>
    <Header>
      <div class="container">
        <div class="flex gap-10 p-10 mt-5">
          <div class="flex-none relative">
            <img
              class="h-auto max-w-lg transition-all duration-300 rounded-lg cursor-pointer filter"
              src="https://static.vecteezy.com/vite/assets/find-your-path-main-b1f6179c.webp"
              alt="image description"
            />
          </div>
          <div>
            <div>
              <p class="text-3xl text-teal-400 font-bold text-align-center py-3">LifeLearn System</p>
              <h5
                class="py-2 text-4xl text-align-center font-bold tracking-tight text-gray-900 dark:text-white"
              >
                Empower Your
                <span class="text-teal-400 font-bold">School</span> With Seamless Management!
              </h5>
              <p class="text-align-center">
                Transform your school's administration with our comprehensive management system,
                streamlining every aspect of school operations for unparalleled efficiency and
                success!
              </p>
            </div>
            <div class="flex justify-center">
              <router-link to="/system/info">
                <el-button
                  class="bg-gray-900 text-white font-bold py-4 px-10 hover:bg-gray-900 focus:bg-gray-900"
                >
                  Show more
                </el-button>
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </Header>
  </WebLayout>
</template>

<style scoped>
.card-details {
  display: flex;
  flex-wrap: wrap;
  gap: 4rem; /* Adjust the gap between cards */
}

/* Adjust individual card styles as needed */
.block {
  flex: 1 0 18rem; /* This sets the minimum width of each card */
  max-width: calc(25% - 1rem); /* This sets the maximum width to fit 4 cards in a row with a gap */
}
</style>

<script setup lang="ts">
import { ref } from 'vue'
import WebLayout from '@/Layouts/Web/WebLayout.vue'
</script>
