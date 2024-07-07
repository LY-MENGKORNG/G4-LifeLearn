import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
import { ref } from 'vue'
import type BookResponse from '@/Constants/api-constants'

export const useBookStore = defineStore('book', {
  state: () => ({
    books: ref<BookResponse>()
  }),
  actions: {
    async fetchBooks() {
      try {
        const response = await axiosInstance.get('/books', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          }
        });
        this.books = response.data;
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }
  }
});