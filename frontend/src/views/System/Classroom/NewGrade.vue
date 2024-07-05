<template>
    <SystemLayout>
        <div class="space-y-22 px-10">
            <div class="flex justify-between">
                <h1 class="text-6xl text-gray-900 dark:text-white">Grade List</h1>
                <div>
                    <button  @click="showForm" class="bg-green-500 p-3 text-white rounded-xl text-ml">+ New grade</button>
                </div>
            </div>
            <div>
                <GradeList/>
                <FormGrade class="absolute  self-stretch top-5 right-80" v-if="formVisible" @create="handleCreate"
                @cancel="closeForm" />
            </div>
        </div>
    </SystemLayout>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import SystemLayout from '@/Layouts/System/SystemLayout.vue'
import { MoreFilled } from '@element-plus/icons-vue'
import GradeList from '@/Components/GradeList.vue'
import FormGrade from '@/Components/FormGrade.vue'

const formVisible = ref(false);

function showForm() {
    formVisible.value = true;
}

function closeForm() {
    formVisible.value = false;
}

function handleCreate() {
    console.log('Create button clicked');
    formVisible.value = false;
}
</script>
