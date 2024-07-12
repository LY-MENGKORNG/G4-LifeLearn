import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
import { ref } from 'vue'

export const useClassStore = defineStore('class', {
  state: () => ({
    class: ref<[]>([])
  }),
  actions: {
    async fetchClasses() {
      try {
        const response = await axiosInstance.get('/class', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          }
        });
        this.class = response.data.data;
        console.log(this.class);
      } catch (error) {
        console.error(error);
      }
    }
  }
});