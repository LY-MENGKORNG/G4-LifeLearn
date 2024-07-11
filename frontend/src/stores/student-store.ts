import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
import { ref } from 'vue'

export const useStudentStore = defineStore('student', {
  state: () => ({
    students: ref<any[]>([])
  }),
  actions: {
    async fetchStudents() {
      try {
        const response = await axiosInstance.get('/student/list', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          }
        });
        this.students = response.data.data;
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }, 
    
  },
});