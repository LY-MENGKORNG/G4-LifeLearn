<template>
  <div class="overflow-hidden border border-gray-200 rounded-lg">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Grade</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">System</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Details</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 divide-y divide-gray-200">
                        <tr v-for="grade in grades" :key="grade.id">
                            <td class="px-6 py-4 whitespace-nowrap">Grade {{ grade.grade_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">System {{ grade.system_id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <router-link :to="{ name: 'system-grade-detail', params:{id: grade.id} }">
                                    Detail
                                </router-link>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button @click="editGrade(index, grade)" class="text-blue-600 hover:text-blue-900">Edit</button> 
                                <button @click="deleteGrade(index, grade)" class="ml-2 text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';
import { RouterLink } from 'vue-router';

const props = defineProps(['grades']);
const emits = defineEmits(['ClassShow']);

const editGrade = (index, grade) => {
  // console.log('Edit clicked:', index, grade);
  // Implement edit logic here
};

const deleteGrade = (index, grade) => {
  // console.log('Delete clicked:', index, grade);
  // Implement delete logic here
};

const showDetails = (index, grade) => {
  // Implement logic to check if the id_grade in class matches the id_grade in grade
  const classId = 1; // Replace with actual logic to get the class id_grade
  if (grade.id_grade === classId) {
    emits('ClassShow', index, grade);
  } else {
    console.log('id_grade does not match');
  }
};
</script>
