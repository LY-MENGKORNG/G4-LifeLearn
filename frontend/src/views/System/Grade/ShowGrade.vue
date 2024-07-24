        
<script setup lang="ts">
import ClassList from "@/Components/Common/List/ClassList.vue"
import { useSystemStore } from '@/stores/system-store'
import { onMounted, ref } from 'vue'
import { useRoute } from 'vue-router'
import { Plus } from '@element-plus/icons-vue'

const route = useRoute()

const systemStore = useSystemStore()
const classes = ref();
onMounted(async () => {
    await systemStore.fetchOneGrade(route.params.id);
    classes.value = systemStore.grade;
})
</script>
        
<template>
    <SystemLayout>
            <div class="flex justify-between items-center">
                <h2 class="text-xl">Class List</h2>
                <el-button type="primary" :icon="Plus">Create</el-button>
            </div>
            <div class="mt-3">
                <ClassList v-for="eachClass in classes" :key="eachClass.id" :name="eachClass.name" /> 
            </div>
    </SystemLayout>
</template>