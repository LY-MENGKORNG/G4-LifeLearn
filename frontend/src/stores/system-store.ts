import { defineStore } from 'pinia'
import { ref } from 'vue'
import axiosInstance from '@/plugins/axios';

export const useSystemStore = defineStore('system', {
    state: () => ({
        system: ref<any>(),
        message: ref<any>(),
        users: ref<any>(),
        status: ref<boolean>(),
        dashboard: ref(),
        grades: ref()
    }),
    actions: {

        async dashboard() {
            try {
                const response: any = await axiosInstance.get('/system/dashboard');
                this.dashboard = response.data.data
                
                this.message = response.message;
                this.status = response.status;
            } catch (error: any) {
                this.message = error.message
                this.status = false
            }
        },
        async fetchGrades() {
            try {
                const response : any = await axiosInstance.get('/system/grades');
                this.grades = response.data.data
            } catch (error) {
                
            }
        },
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

                this.message = response.data.message;
                this.status = true;
            } catch (error: any) {
                this.message = error.message;
                this.status = false
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
        async fetchUsers(path: string) {
            try {
                const response = await axiosInstance.get(path)
                this.users = response.data.data
                } catch (error: any) {
                console.warn(error)
                this.message = error.message
            }
        }
    }
})