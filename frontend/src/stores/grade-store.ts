import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
import { ref } from 'vue'

export const useGradeStore = defineStore('grade', {
  state: () => ({
    grades: ref([])
  }),
  actions: {
    async fetchGrades(path: string = '/grade') {
      try {
        const response = await axiosInstance.get(path, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          }
        });
        this.grades = response.data.data;
        console.log(this.grades);
      } catch (error) {
        console.error(error);
      }
    },
  }
});