<template>
  <SystemLayout>
    <div class="flex items-center justify-center h-full w-full ">
      <div class="h-full space-y-8">
        <div class="bg-gray-200 pr-10 py-2 border-b border-gray-300 flex justify-end items-center space-x-1">
          <button class="relative" @click="showForm">
            <el-icon class="mr-5 font-black" :size="26"
            @mouseover="showTooltip = true"
            @mouseleave="showTooltip = false">
            <Plus /></el-icon>
            <div v-if="showTooltip" class="absolute bg-gray-800 text-white text-sm p-2 rounded w-max mt-2">
              Create or join a class
            </div>
          </button>
          <img class="w-10 h-10 object-cover rounded-full shadow-md"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT35Sk9mMEcBuooCRGNUylcYn-PR6IZhDHzvA&s"
            alt="Course Image" />
        </div>

        <div class="scrollable-content px-20">
          <router-link to="/system/material" class="flex flex-wrap">
            <CardView v-for="classroom in classroomList" :key="classroom.id"/>
          </router-link>
        </div>
        
        <FormclassCreate class="w-full" v-if="formVisible" @create="handleCreate" @cancel="closeForm" />
      </div>
    </div>
  </SystemLayout>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { Plus } from '@element-plus/icons-vue';
import SystemLayout from '@/Layouts/System/SystemLayout.vue';
import CardView from '@/Components/Classroom/CardView.vue';
import FormclassCreate from '@/Components/Classroom/FormclassCreate.vue';
import { useClassroomStore } from '@/stores/classroom-store';

const classroomStore = useClassroomStore();
const classroomList = ref<any>([]);

const showTooltip = ref(false);
const formVisible = ref(false);

onMounted(async () => {
  await classroomStore.fetchClassrooms();
  console.log('Classroom data:', classroomStore.classrooms); // Debugging log
  classroomList.value = classroomStore.classrooms.map(classroom => ({
    ...classroom,
    grades: [] // Initialize grades array for each student
  }));
  console.log('Processed classroom list:', classroomList.value); // Debugging log
});

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

<style scoped>
.scrollable-content {
  height: calc(100vh - 56px);
  overflow-y: auto;
}
</style>