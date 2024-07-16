import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
// import type {Quiz} from '@/Constants/api-constants'
import type Quiz from '@/Constants/api-constants'
import { ref } from 'vue'

const QUIZ: Quiz = { 
        // id: null,
        classroom_id:  1,
        title: '',
        instructions: '',
        points: null,
        deadline: '',
        topics: '',
        links: '',
        fields: '',
}

export const useQuizStore = defineStore('Quiz', {
  state: () => ({
    quizze: ref<Quiz>(QUIZ)
  }),
  actions: {
    async fetchQuizzes() {
      try {
        const response = await axiosInstance.get('/quizze', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          }
        });
        this.quizze = response.data.data;
        console.log(this.quizze);
      } catch (error) {
        console.error(error);
      }
    },

    async QuizCreate(quizze: any) {
        try {
            const response = await axiosInstance.post('/quizze', quizze);
            console.log(response);
        }catch (error) {
            // console.warn(error)
        }
    }

  }
});