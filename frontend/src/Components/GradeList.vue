<template>
  <div class="overflow-hidden border border-gray-200 rounded-lg">
    <table class="min-w-full bg-white">
      <thead class="bg-gray-200">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grade</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">System</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Create date</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
      </thead>
      <tbody class="text-gray-600 divide-y divide-gray-200">
        <tr v-for="(grade, index) in grades" :key="index">
          <td class="px-6 py-4 whitespace-nowrap">grade {{ grade.grade_number}}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ grade.system_id }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ grade.created_at }}</td>
          <td class="px-6 py-4 whitespace-nowrap">
            <button @click="ViewDetial(index, grade)" class="text-blue-600 hover:text-blue-900">Edit</button>
            <button @click="handleEdit(index, grade)" class="text-blue-600 hover:text-blue-900">Edit</button>
            <button @click="handleDelete(index, grade)" class="ml-2 text-red-600 hover:text-red-900">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { View } from '@element-plus/icons-vue';
import { defineProps } from 'vue';

const props = defineProps(['grades']);

const handleEdit = (index, grade) => {
  console.log('Edit clicked:', index, grade);
  // Implement edit logic here
};

const ViewDetial = (index, grade) => {
  console.log('Delete clicked:', index, grade);
  // Implement delete logic here
};
</script>
