import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';

export const useBookStore = defineStore('book', {
  state: () => ({
    books: [] as Array<{ id: number, title: string, description: string }>
  }),
  actions: {
    async fetchBooks() {
      try {
        const response = await axiosInstance.get('/book/list', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          }
        });
        this.books = response.data;
      } catch (error) {
        console.error('Error fetching books:', error);
      }
    }
  }
});