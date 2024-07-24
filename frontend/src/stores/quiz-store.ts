import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
import type Quiz from '@/Constants/api-constants'
import { ref } from 'vue'

const QUIZ: Quiz = { 
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
    quizze: ref<Quiz>(QUIZ),
    quiz: ref(),
  }),
  actions: {
    async fetchQuizzes() {
      try {
        const response = await axiosInstance.get('/quizze');
        this.quizze = response.data;
      } catch (error) {
        console.error(error);
      }
    },
    async fetchQuizzesOne(id: string) {
      try {
        const response = await axiosInstance.get('/quizze/' + id);
        this.quiz = response.data;
      } catch (error) {
        console.error(error);
      }
    },

    async QuizCreate(quizze: any) {
        try {
            const response = await axiosInstance.post('/quizze', quizze);
            console.log(response);
        }catch (error) {
            console.warn(error)
        }
    }

  }
});