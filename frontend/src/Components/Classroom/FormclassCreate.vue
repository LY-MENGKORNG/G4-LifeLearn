<template>
  <form @submit.prevent="createClassroom">
    <div class="absolute bg-gray-100 p-4 top-0 left-0 w-full h-full bg-opacity-50 flex justify-center items-center">
      <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md w-96">
        <h2 class="text-lg font-semibold mb-4">Create Class</h2>
        <div class="mb-4">
          <label for="class-name" class="block font-medium">Class name (required)</label>
          <input type="text" v-model="classroom.class_name" id="class-name" class="w-full border rounded p-2" placeholder="Enter class name">
        </div>
        <div class="mb-4">
          <label for="description" class="block font-medium">Description</label>
          <input type="text" v-model="classroom.description" id="description" class="w-full border rounded p-2" placeholder="Enter description">
        </div>
        <div class="flex justify-between">
          <button type="button" @click="cancel" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded">Cancel</button>
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Create</button>
        </div>
      </div>
    </div>
  </form>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { useClassroomStore } from '@/stores/classroom-store';

const classroomStore = useClassroomStore();
const classroom = ref({
  grade_id: 1,
  class_name: '',
  description: '',
});

const emit = defineEmits(['create', 'cancel']);

const createClassroom = async () => {
  try {
    await classroomStore.createClassroom(classroom.value);
    console.log('Creating classroom with data:', classroom.value);
    console.log(1);
    emit('create');
  } catch (error) {
    console.warn("Error creating classroom:", error);
    console.log(3);
  }
};

const cancel = () => {
  emit('cancel');
};
</script>
