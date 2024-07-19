import { defineStore } from 'pinia'
import { ref } from 'vue'
import axiosInstance from '@/plugins/axios';


export const useSystemStore = defineStore('system', {
    state: () => ({
        system: ref<any>(),
        message: ref<any>()
    }),
    actions: {
        async sendRequest(value: any) {
            try {
                const response: any  = await axiosInstance.post('/system-request', value); 
                this.message = response.message;
            } catch (e) {
                console.warn(e);
            }
        },
        async fetchSystem() {
            try {
                const response = await axiosInstance.get('/system');
                this.system = response.data.data;   
            } catch (error) {
                /**empty */
            }
        }
    }
})