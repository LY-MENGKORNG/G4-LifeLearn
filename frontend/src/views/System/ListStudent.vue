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
            <el-button type="primary" @click="showForm(scope.row)">Add</el-button>
          </template>
        </el-table-column>
        <el-table-column>
          <template v-slot="scope">
            <!-- Render GradeList for each student row -->
            <GradeList class="h-120" :grades="scope.row.grades" v-if="scope.row === selectedStudent" />
          </template>
        </el-table-column>
      </el-table>

      <!-- FormGrade component for top right positioning -->
      <FormGrade
        class="absolute top-0 right-0 mt-0 mr-4 z-10"
        v-if="formVisible"
        @create="handleCreate"
        @cancel="closeForm"
      />
    </div>
  </SystemLayout>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import SystemLayout from '@/Layouts/System/SystemLayout.vue';
import { useStudentStore } from '@/stores/student-store';
import FormGrade from '@/Components/FormGrade.vue';
const studentStore = useStudentStore();
const studentList = ref<any>([]);
const formVisible = ref(false);
const selectedStudent = ref(null); // Track the selected student for showing grades

function showForm(student) {
  formVisible.value = true;
  selectedStudent.value = student; // Set the selected student for GradeList display
}

function closeForm() {
  formVisible.value = false;
  selectedStudent.value = null; // Reset selected student when closing the form
}

function handleCreate() {
  formVisible.value = false;
}

onMounted(async () => {
  await studentStore.fetchStudents();
  studentList.value = studentStore.students.map(student => ({
    ...student,
    grades: [] // Initialize grades array for each student
  }));

  onMounted(async () => {
    await store.fetchGrades();
    grades.value = store.grades;
});
});
</script>
