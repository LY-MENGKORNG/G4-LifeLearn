import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
import { ref } from 'vue'

export const useGradeStore = defineStore('grade', {
  state: () => ({
    grades: ref([])
  }),
  actions: {
    async fetchGrades(path: string = '/system/grades') {
      try {
        const response = await axiosInstance.get(path);
        this.grades = response.data.data;
        console.log(this.grades);
      } catch (error) {
        console.error(error);
      }
    },
  }
});