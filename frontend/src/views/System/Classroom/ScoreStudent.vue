<template>
  <div class="flex justify-center">
    <div class="flex justify-center max-w-90 shadow-md mx-auto items-center bg-slate-100 mt-4">
      <el-container class="flex m-auto">
        <el-form class="flex-1 p-10 text-start" @submit.prevent="submitForm">
          <h3 class="text-2xl font-bold mb-2">Student Score</h3>
          <el-form-item class="mt-2">
            <label for="score">Score:</label>
            <el-input id="score" type="number" v-model.number="score.score" />
          </el-form-item>
          <el-form-item class="mt-2">
            <label for="feedback">Comment feedback:</label>
            <el-input id="feedback" v-model="score.feedback" type="textarea" placeholder="Please input" />
          </el-form-item>
          <el-button type="submit" @click="submitForm" class="w-20 mt-3 bg-teal-500 hover:bg-teal-500 text-white">Send</el-button>
        </el-form>
      </el-container>
    </div>
  </div>
</template>

<script setup lang="ts">
import axiosInstance from '@/plugins/axios';
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';

const score = ref({ score: '', feedback: '' }); 
const router = useRouter();

onMounted(async () => {
  try {
    const { data } = await axiosInstance.get('/score');
    if (data.data && data.data.length > 0) {
      score.value = {
        score: data.data[0].score,
        feedback: data.data[0].feedback || '' 
      };
    }
  } catch (error) {
    console.error('Error fetching score:', error);
  }
});
const submitForm = async () => {
  try {
    if (score.value.score === '' || score.value.feedback === '') {
      console.warn('Please fill out all fields.');
      return;
    }
    const result = {
      scores: score.value.score,
      feedback: score.value.feedback
    }
    console.log('Submitting result:', result);
    router.push('/system/student');

  } catch (error) {
    console.error('Error submitting score');
  }
};
</script> 


