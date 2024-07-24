<template>
    <SystemLayout>
        <div class="  ">
            <div class="flex justify-between items-center">
                <h2 class="text-xl">Grade List</h2>
                <button
                    @click="showForm"
                    class="flex gap-2 items-center py-2 px-4 rounded-md bg-green-400 hover:bg-green-400/80 active:bg-green-400/60 transition-all">
                    <Plus class="w-5" />
                    <span>Create</span>
                </button>
            </div>
            <div class="mt-3">
                <GradeList class="h-120" :grades="grades" />
                <FormGrade class="absolute self-stretch top-5 right-80" v-if="formVisible" @create="handleCreate"
                    @cancel="closeForm" />
            </div>
        </div>
    </SystemLayout>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import GradeList from '@/Components/GradeList.vue';
import FormGrade from '@/Components/FormGrade.vue';
import { useSystemStore } from '@/stores/system-store';
import { Plus } from '@element-plus/icons-vue';

const systemStore = useSystemStore();

const formVisible = ref(false);
const grades = ref();


function showForm() {
    formVisible.value = true;
}

function closeForm() {
    formVisible.value = false;
}

function handleCreate() {
    formVisible.value = false;
}

onMounted(async () => {
    await systemStore.fetchGrades();
    grades.value = systemStore.grades;
});

</script>