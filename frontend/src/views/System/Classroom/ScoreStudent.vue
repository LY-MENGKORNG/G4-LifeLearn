<template>
  <div class="flex justify-center">
    <div class="flex justify-center max-w-90 shadow-md mx-auto items-center bg-slate-100 mt-4">
      <el-container v-if="formVisible">
        <el-form class="flex-1 p-10 text-start" @submit.prevent="submitScore">
          <h3 class="text-2xl font-bold mb-2">Student Score</h3>
          <el-form-item class="mt-2" :error="emailError">
            <label for="email">Email:</label>
            <el-input id="email" type="email" v-model="score.email" @blur="validateEmail" />
            <span v-if="emailError" class="text-red-500">{{ emailError }}</span>
          </el-form-item>
          <el-form-item class="mt-2">
            <label for="score">Score:</label>
            <el-input id="score" type="number" v-model.number="score.score" />
          </el-form-item>
          <el-form-item class="mt-2">
            <label for="feedback">Comment feedback:</label>
            <el-input id="feedback" type="textarea" v-model="score.feedback" placeholder="Please input" />
          </el-form-item>
          <button 
            type="submit" 
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Submit</button>
        </el-form>
      </el-container>
    </div>

    <el-dialog
      title="Score Submitted"
      :visible.sync="showScoreModal"
      @close="closeScoreModal"
    >
      <p>Email: {{ score.email }}</p>
      <p>Score: {{ score.score }}</p>
      <p>Feedback: {{ score.feedback }}</p>
      <template #footer>
        <el-button @click="closeScoreModal">Close</el-button>
      </template>
    </el-dialog>
    
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import axiosInstance from '@/plugins/axios';

const score = ref({
  email: '',
  score: '',
  feedback: ''
  
});

const emailError = ref<string | null>(null);
const formVisible = ref(true);
const showScoreModal = ref(false);
const router = useRouter();

const validateEmail = () => {
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  emailError.value = emailPattern.test(score.value.email) ? null : 'Invalid email address';
};

const submitScore = async () => {
  if (!score.value.email || !score.value.score || !score.value.feedback) {
    alert('Please fill out all fields.');
    return;
  }

  if (emailError.value) {
    alert('Please correct the email address.');
    return;
  }

  try {
    await axiosInstance.post('/score', {
      email: score.value.email,
      score: score.value.score,
      feedback: score.value.feedback,
    });
    
    // Show the score modal
    showScoreModal.value = true;

    // Redirect to student page after submission
    router.push('/system/student');
  } catch (error) {
    console.error('Error submitting score:', error);
    alert('Failed to submit score. Please try again.');
  }
};

const closeScoreModal = () => {
  showScoreModal.value = false;
};

onMounted(async () => {});
</script>
