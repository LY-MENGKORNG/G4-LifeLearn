<template>
  <SystemLayout>
    <div>
      <h1 class="text-2xl font-bold mb-4 px-3">List of Students</h1>
      <el-table :data="studentList">
        <el-table-column label="Name">
          <template v-slot="scope">
            {{ scope.row.first_name }} {{ scope.row.last_name }}
          </template>
        </el-table-column>
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
import { ref, onMounted } from 'vue';
import SystemLayout from '@/Layouts/System/SystemLayout.vue';
import { useStudentStore } from '@/stores/student-store';
import { useClassroomStore } from '@/stores/classroom-store';

const studentStore = useStudentStore();
const studentList = ref<any>([]);
const classroomStore = useClassroomStore();
const selectedStudents = ref<any>([]);

onMounted(async () => {
  await studentStore.fetchStudents();
  studentList.value = studentStore.students.map(student => ({
    ...student,
    grades: [] // Initialize grades array for each student
  }));
});

function addStudent(student) {
  selectedStudents.value.push(student.id);
}

async function addStudentsToClassroom() {
  await classroomStore.addStudentsToClassroom(selectedStudents.value);
  selectedStudents.value = [];
}
</script>
