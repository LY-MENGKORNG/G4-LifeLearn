<!-- src/views/System/ListStudent.vue -->
<template>
  <SystemLayout>
    <div>
      <h1 class="text-2xl font-bold mb-4 px-3">List of Students</h1>
      <el-table :data="students">
        <el-table-column prop="name" label="Name"></el-table-column>
        <el-table-column prop="email" label="Email"></el-table-column>
        <el-table-column>
          <template v-slot="scope">
            <el-button type="primary" @click="addStudent(scope.row)">Add</el-button>
          </template>
        </el-table-column>
      </el-table>
    </div>
  </SystemLayout>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import SystemLayout from '@/Layouts/System/SystemLayout.vue';

const students = ref([
  { name: 'Student 1', email: 'student1@example.com' },
  { name: 'Student 2', email: 'student2@example.com' },
  // Add more students here
]);

function addStudent(student) {
  // Logic to add student to the classroom
  console.log('Adding student:', student);
}
</script>
