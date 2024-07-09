        
<script setup lang="ts">
import SystemLayout from "@/Layouts/System/SystemLayout.vue"
import router from "@/router";
import { useClassStore } from "@/stores/class-store";
import { useGradeStore } from "@/stores/grade-store";
import { onMounted, ref } from "vue";
import ClassCard from '@/Components/Common/Card/ClassCard.vue';

const store = useGradeStore()
const classList = ref([])

onMounted(async () => {
    await store.fetchGrades("/grade/" + router.router.currentRoute.value.params.id)
    classList.value = store.grades.classes;
})
</script>
        
<template>
    <SystemLayout>
        <div class=" bg-gray-100 rounded-2xl pl-12 ">
            <div class="book flex flex-wrap g-5 gap-x-12 gap-y-10">
                <ClassCard v-for="classes in classList" :key="classes.id" :name="classes.name"
                    :grade_id="classes.grade_id" />
            </div>
        </div>
    </SystemLayout>
</template>