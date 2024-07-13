import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';

export const useClassroomStore = defineStore('classroom', {
  state: () => ({
    classrooms: [] as any[], // Define type for classrooms array
    selectedClassroomId: null, // Define type for selected classroom id
  }),
  actions: {
    async fetchClassrooms() {
      try {
        const response = await axiosInstance.get(`/classroom`);
       this.classrooms = response.data;
      } catch (error) {
        console.error('Error fetching students:', error);
      }
    },

    async addStudentsToClassroom(frontuserId) {
      try {
        const response = await axiosInstance.post(`/classrooms/${this.selectedClassroomId}/add-students`, { frontuser_id: frontuserId });
        return response.data;
      } catch (error) {
        console.error('Error adding students to classroom:', error);
      }
    }
    
  },
});
