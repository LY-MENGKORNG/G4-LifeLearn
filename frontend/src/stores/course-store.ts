import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
import { ref } from 'vue';


export const useCourseStore = defineStore('course', {
    state: () => ({
        courses: ref<any[]>()
    }),
    actions: {
        async fetchCourses() {
            const response = await axiosInstance.get('/course/list');
            this.courses = response.data.data;
        }
    }
});