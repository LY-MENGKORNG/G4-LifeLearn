<template>
    <SystemLayout>
        <div class="space-y-22 px-10">
            <div class="flex justify-between">
                <h1 class="text-6xl text-gray-900 dark:text-white">Grade List</h1>
                <div>
                    <button @click="showForm" class="bg-green-500 p-3 text-white rounded-xl text-ml">
                        + New grade
                    </button>
                </div>
            </div>
            <div>
                <GradeList class="h-120" :grades="grades" />
                <FormGrade class="absolute self-stretch top-5 right-80" v-if="formVisible"
                 @create="handleCreate" @cancel="closeForm" />
            </div>
        </div>
    </SystemLayout>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import SystemLayout from '@/Layouts/System/SystemLayout.vue'
import GradeList from '@/Components/GradeList.vue'
import FormGrade from '@/Components/FormGrade.vue'
import axiosInstance from '@/plugins/axios'

const formVisible = ref(false)
const grades = ref([])

function showForm() {
    formVisible.value = true
}

function closeForm() {
    formVisible.value = false
}

function handleCreate() {
    console.log('Create button clicked')
    formVisible.value = false
}

onMounted(async () => {
    try {
        const { data } = await axiosInstance.get('/grade')
        grades.value = data.data
        console.log(data.data)
    } catch (error) {
        console.error('Error fetching grades:', error)
    }
})
</script>
