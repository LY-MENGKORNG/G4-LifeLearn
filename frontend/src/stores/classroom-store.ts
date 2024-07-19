import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
import type Classroom from '@/Constants/api-constants'
import { ref } from 'vue'

const CLASSROOM: Classroom = { 
  grade_id:  1,
  class_name: '',
  description: '',
}

export const useClassroomStore = defineStore('classroom', {
  state: () => ({
    classrooms: ref<Classroom>(CLASSROOM), 
    class: ref(), 
  }),


  actions: {
    async fetchClassrooms() {
      try {
        const response = await axiosInstance.get(`/classroom`);
       this.classrooms = response.data;
      } catch (error) {
        console.error('Error fetching students:', error);
      }
    },

    async createClassroom(quizze: any) {
      try {
          const response = await axiosInstance.post('/classroom', quizze);
          console.log(response);
      }catch (error) {
          console.warn(error)
      }
  }
  },
});
