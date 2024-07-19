<template>
  <div class="flex justify-center">
    <div class="flex justify-center max-w-90 shadow-md mx-auto items-center bg-slate-100 mt-4">
      <el-container class="flex m-auto">
        <el-form class="flex-1 p-10 text-start" @submit.prevent="submitForm(score, index)">
          <div class="form-com" v-for="score in scores" :key="score.id">
            <h3 class="text-2xl font-bold mb-2">Student Score</h3>
            <el-form-item class="mt-2">
              <label for="score">Score:</label>
              <el-input id="score" type="number" v-model.number="score.score" />
            </el-form-item>
            <el-form-item class="mt-2">
              <label for="feedback">Comment feedback:</label>
              <el-input id="feedback" v-model="score.feedback" :rows="2" type="textarea" placeholder="Please input" />
            </el-form-item>
            <el-button type="submit" @click="submitForm" class="w-20 mt-3 bg-teal-500 hover:bg-teal-500 text-white">Send</el-button>
          </div>
        </el-form>
      </el-container>
    </div>
  </div>
</template>

<script setup lang="ts">
import axiosInstance from '@/plugins/axios';
import { ref, onMounted } from 'vue';

const scores = ref([]); 

onMounted(async () => {
  try {
    const { data } = await axiosInstance.get('/score');
    scores.value = data.data.map(item => ({
      ...item,
      feedback: '' 
    }));
  } catch (error) {
    console.error('Error fetching scores:', error);
  }
});

const submitForm = async (score) => {
  try {
    const payload = { score: score.score, feedback: score.feedback };
    await axiosInstance.post('/score', payload);
    console.log('Score submitted successfully');
  } catch (error) {
    console.error('Error submitting score:', error);
  }
};
</script> 

