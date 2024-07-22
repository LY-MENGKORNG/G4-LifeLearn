import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
import { ref } from 'vue'

export const useBookStore = defineStore('book',  { 
  state: () => ({
    books: ref<any>(),
    book: ref<any>()
  }),
  actions: {
    async fetchBooks() {
      try {
        const response = await axiosInstance.get('/books');
        this.books = response.data.data;
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    },
    async  fetchOneBook(id: any) {
      try {
        const response = await axiosInstance.get('/books/'+id);
        this.book  = response.data.data 
      }catch(e) {
        console.warn(e)
      }
    },
    async addToFavorite() {

    }
  }
});