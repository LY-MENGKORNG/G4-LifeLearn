import { defineStore } from 'pinia'
import {ref} from 'vue'

export const useCounterStore = defineStore('button', () => {
    state: () => ({
        count: ref(1)
    })
})