<template>
    <SystemLayout>
        <div class="book-list">
            <div class="grid grid-cols-2 gap-4 md:grid-cols-13 lg:grid-cols-5 gap-x-1 gap-y-1">
                <div
                    class="rounded-lg bg-white border text-center shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface mt-5 max-w-[18rem] max-h-[21rem] overflow-hidden hover:transform hover:-translate-y-5 transition duration-300 ease-in-out">
                    <img src="https://i.pinimg.com/564x/ea/24/59/ea2459649c44bf24601ba7b9f3a2383b.jpg"
                        alt="Description of image" class="w-full h-[190px] object-cover rounded-t-lg" />
                    <div class="p-6">
                        <h5 class="mb-2 text-lg font-medium leading-tight text-start">
                            <b>Class A</b>
                        </h5>
                        <p class="mb-2 text-base text-start py-1 min-w-[18rem]">
                            Grade:12
                            <span class="text-yellow-400 ml-10">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </SystemLayout>
</template>

<script setup lang="ts">
import SystemLayout from '@/Layouts/System/SystemLayout.vue'
</script>