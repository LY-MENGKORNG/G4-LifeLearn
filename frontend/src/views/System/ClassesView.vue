<template>
    <SystemLayout>
        <div class=" bg-gray-100 rounded-2xl pl-12 ">
      <div class="book flex flex-wrap g-5 gap-x-12 gap-y-10">
            <ClassCard 
                v-for="classes in classlist" 
                :key="classes.id" 
                :name="classes.name"
                :grade_id="classes.grade_id" 
            />
            </div>
            </div>

    </SystemLayout>
</template>

<script setup lang="ts">
import axiosInstance from '@/plugins/axios';
import SystemLayout from '@/Layouts/System/SystemLayout.vue';
import ClassCard from '@/Components/Common/Card/ClassCard.vue';
import { ref, onMounted } from 'vue';

const classlist = ref([]);

onMounted(async () => {
    try {
        const { data } = await axiosInstance.get('/class');
        classlist.value = data.data;
        console.log(data);
    } catch (error) {
        console.error('Error fetching classes:', error);
    }
});
</script>
