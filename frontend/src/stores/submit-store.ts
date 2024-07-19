import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
import type Submit from '@/Constants/api-constants'
import { ref } from 'vue'

const SUBMIT: Submit = { 
        // user_id: 1,
        classroom_id:1,
        assignment_id: 1,
        work: '',
}

export const useSubmitStore = defineStore('Submit', {
  state: () => ({
    submits: ref<Submit>(SUBMIT),
    submit: ref(),
  }),
  actions: {
    async fetchSubmit() {
      try {
        const response = await axiosInstance.get('/submit');
        this.submits = response.data;
      } catch (error) {
        console.error(error);
      }
    },

    async SubmitQuizz(submits: any) {
        try {
            const response = await axiosInstance.post('/submit', submits);
            console.log(response);
        }catch (error) {
            console.warn(error)
        }
    }
  }
});
