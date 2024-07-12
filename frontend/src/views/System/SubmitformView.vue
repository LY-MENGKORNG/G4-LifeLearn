<template>
    <SystemLayout>
        <div class="flex justify-between p-4 rounded-lg shadow-md h-screen">
            <div class="flex items-cente w-full px-3">
                <div class="w-full">
                    <div class="flex flex-col border-b-2 border-blue-500 justify-between">
                        <div class="flex flex-col">
                            <p class="text-lg font-bold">UML Diagram Final Project</p>
                            <p>Yon YEN • Apr 10</p>
                        </div>
                        <div class="flex justify-between">
                            <p>100 points</p>
                            <p>Due Feb 8, 11:59 PM</p>
                        </div>
                    </div>
                    <div class="py-5">
                        <p class="flex">
                            <el-icon :size="20" class="mr-4">
                                <User />
                            </el-icon>
                            Class comments
                        </p>
                        <button class=" text-blue-500 px-2 py-1 rounded">
                            Add a class comment
                        </button>
                    </div>
                </div>
            </div>
            <div class="cols space-y-3 ">
                <div class="flex flex-col shadow bg-white p-4 w-70 space-y-3 rounded">
                    <div class="flex flex-row justify-between">
                        <div class="rounded">+ Add or create</div>
                        <p>Your work</p>
                    </div>
                    <button class="border-1 border-gray-500 p-4 rounded items-centerw-max">
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                    </button>
                    <button class="border-1 border-gray-500 p-2 rounded items-center w-full text-blue-700">Submit</button>
                </div>
                <div class="bg-white w-max space-y-3 rounded shadow absolute">
                    <div class="p-4 space-y-3 ">
                        <div class="flex space-x-4">
                            <el-icon :size="20">
                                <User />
                            </el-icon>
                            <p class="text-xl">Private comments</p>
                        </div>
                            <button class="px-2 py-1 rounded text-xl text-blue-500" @click="ShowForm">
                            Add comment to Rady Y
                            </button>
                            <FormComment v-if="formVisible" />
                    </div>
                    
                </div>
            </div>
            
        </div>
    </SystemLayout>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import FormComment from '@/Components/Classroom/FomComment.vue'
import { RouterLink } from 'vue-router'
import SystemLayout from '@/Layouts/System/SystemLayout.vue'
import { User } from '@element-plus/icons-vue'

const formVisible = ref(false)

function ShowForm(){
    if(formVisible.value){
        formVisible.value = false
        console.log("Trues")
    }
    else{
        formVisible.value = true
    }
}

</script>