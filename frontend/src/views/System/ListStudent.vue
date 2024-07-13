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
            <el-button type="primary" @click="sendEmail(scope.row)">Add</el-button>
          </template>
        </el-table-column>
      </el-table>
    </div>
  </SystemLayout>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import SystemLayout from '@/Layouts/System/SystemLayout.vue';
import axiosInstance from '@/plugins/axios';

const studentList = ref([]);

onMounted(async () => {
  await fetchStudents();
});

async function fetchStudents() {
  try {
    const response = await axiosInstance.get('/student/list', {
      headers: {
        Authorization: `Bearer ${localStorage.getItem('access_token')}`
      }
    });
    studentList.value = response.data.data;
  } catch (error) {
    console.error('Error fetching students:', error);
  }
}

async function sendEmail(student) {
  const mail = {
    email: student.email,
    subject: 'Invitation to join a classroom',
    message: 'Dear'+ student.first_name
  }

  try {
    const response = await axiosInstance.post('/send-mail', mail);
    alert('Email sent successfully to ' + student.email);
  } catch (error) {
    console.error('Error sending email:', error);
    alert('Failed to send email to ' + student.email);
  }

}

</script>
