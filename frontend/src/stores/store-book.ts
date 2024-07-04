import { defineStore } from 'pinia'
export const useBookStore = defineStore('bookStore', {
    state: () => ({
        display: [] as any[], // Define the type of your display array
      }),
      actions: {
        addToMyLearn(book) {
          this.display.push(book);
        },
      },
})