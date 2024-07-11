<template>
    <el-header class="flex items-center justify-between bg-white">
        <el-button @click="action" class="border-none">
            <Fold size="15px" />
        </el-button>
        <div class="el-badge item">
            <button aria-disabled="false" type="button" plain @click="toggleCodeBlock"
                class="el-button border-none h-[27px] w-[27px] rounded-circle ml-250">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 1024 1024">
                        <path fill="currentColor" d="M512 64a64 64 0 0 1 64 64v64H448v-64a64 64 0 0 1 64-64"></path>
                        <path fill="currentColor"
                            d="M256 768h512V448a256 256 0 1 0-512 0zm256-640a320 320 0 0 1 320 320v384H192V448a320 320 0 0 1 320-320">
                        </path>
                        <path fill="currentColor"
                            d="M96 768h832q32 0 32 32t-32 32H96q-32 0-32-32t32-32m352 128h128a64 64 0 0 1-128 0"></path>
                    </svg>
                </span>
            </button>
            <sup class="el-badge__content el-badge__content--primary is-fixed">5</sup>
        </div>
        <!-- pop up -->
        <div v-if="showCodeBlock" class="fixed inset-0 flex items-center  mt-10 ml-230">
            <div class="flex flex-col h-full">
                <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="w-2 bg-teal-900"></div>
                    <div class="flex items-center px-2 py-3">
                        <img class="w-12 h-12 object-cover rounded-full"
                            src="https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60">
                        <div class="mx-3">
                            <h3 class="text-xl font-semibold text-black-800">Hello John</h3>
                            <p class="text-gray-600">Please join class with me</p>
                        </div>
                    </div>
                    <button @click="toggleCodeBlock"
                        class="absolute top-0 right-0 m-3 text-gray-600 hover:text-teal-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path d="M18 6L6 18"></path>
                            <path d="M6 6L18 18"></path>
                        </svg>
                    </button>
                    <button @click="toggleCodeBlock"
                        class=" h-10 mt-4 mr-2 p-1 bg-blue-200 rounded-md hover:bg-teal-400">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
        <SystemProfile src="" />
      
    </el-header>

</template>

<script setup lang="ts">
import SystemProfile from '../Profile/SystemProfile.vue'
import { Fold } from '@element-plus/icons-vue'
import { ElMessage } from 'element-plus'
import { defineProps, ref } from 'vue'
const props = defineProps({
    action: Function,
})

const showCodeBlock = ref(false)

const toggleCodeBlock = () => {
    showCodeBlock.value = !showCodeBlock.value // Toggle the value of showCodeBlock
}
</script>
