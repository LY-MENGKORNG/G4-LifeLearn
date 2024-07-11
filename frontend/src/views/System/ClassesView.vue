<template>
    <SystemLayout>
        <div class=" bg-gray-100 rounded-2xl pl-12 ">
            <div class="book flex flex-wrap g-5 gap-x-12 gap-y-10">
                <ClassCard v-for="classes in classlist" :key="classes.id" :name="classes.name"
                    :grade_id="classes.grade_id" />
            </div>
        </div>

    </SystemLayout>
</template>

<script setup lang="ts">
import axiosInstance from '@/plugins/axios';
import SystemLayout from '@/Layouts/System/SystemLayout.vue';
import ClassCard from '@/Components/Common/Card/ClassCard.vue';
import { ref, onMounted } from 'vue';
import { useClassStore } from '@/stores/class-store';
const store = useClassStore();

const classlist = ref();

onMounted(async () => {
    await store.fetchClasses();
    classlist.value = store.class;
});
</script>
