import { defineStore } from 'pinia'
import { ref } from 'vue'
import axiosInstance from '@/plugins/axios';


export const useSystemStore = defineStore('system', {
    state: () => ({
        system: ref<any>(),
        message: ref<any>(),
        users: ref<any>(),
        status: ref(),
    }),
    actions: {
        async sendRequest(value: any) {
            try {
                const response: any = await axiosInstance.post('/system-request', value);
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
        },
        async sendMail(mail: any, path: string) {
            try {
                const response = await axiosInstance.post(path, mail)
                console.log(response)
                this.status = true
            } catch (error: any) {
                console.warn(error)
                this.message = error.message
                this.status = false
            }
        },
        async fetchUsers(request: any) {
            try {
                const response = await axiosInstance.get('/users', {
                    role: request
                })
                this.users = response.data
            } catch (error: any) {
                console.warn(error)
                this.message = error.message
            }
        }
    }
})