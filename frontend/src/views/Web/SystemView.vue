<template>
    <WebLayout>
        <Header>
            <div class="container">
                <div class="flex gap-10 p-10">
                    <div class="flex-none relative">
                        <img class="h-auto max-w-lg transition-all duration-300 rounded-lg cursor-pointer filter"
                            src="https://static.vecteezy.com/vite/assets/find-your-path-main-b1f6179c.webp"
                            alt="image description">
                    </div>
                    <div class="">
                        <div class="">
                            <p class="text-3xl text-teal-400 font-bold text-align-center">LifeLearn System</p>
                            <h5
                                class="py-2 text-4xl text-align-center font-bold tracking-tight text-gray-900 dark:text-white">
                                Empower Your
                                <span class="text-teal-400 font-bold">School</span> With Seamless Management!
                            </h5>
                            <p class="text-align-center">Transform your school's administration with our comprehensive
                                management system, streamlining
                                every
                                aspect of school operations for unparalleled efficiency and success!</p>
                        </div>
                        <div class=" flex justify-center">
                            <router-link to="/system/create">
                                <el-button
                                    class="bg-gray-900 text-white fornt-bold hover:gray-900 py-4 px-10  text-1.5xl">Buy
                                    Now</el-button>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </Header>
    </WebLayout>
</template>

<script setup lang="ts">
import WebLayout from '@/Layouts/Web/WebLayout.vue';
</script>
