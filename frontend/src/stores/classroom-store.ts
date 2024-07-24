import { defineStore } from 'pinia'
import axiosInstance from '@/plugins/axios'
import type Classroom from '@/Constants/api-constants'
import { ref } from 'vue'

const CLASSROOM: Classroom = {
  grade_id: null,
  class_name: '',
  description: '',
  user:{ 
    first_name: '',
    last_name: '',
    phone: '',
    email: '',
    profile: '',
  },
}

export const useClassroomStore = defineStore('Classroom', {
  state: () => ({
    classrooms: ref<Classroom>(CLASSROOM),
    class: ref()
  }),

  actions: {
    async fetchClassrooms() {
      try {
        const response = await axiosInstance.get(`/classroom`)
        this.classrooms = response.data
      } catch (error) {
        console.error('Error fetching students:', error)
      }
    },

    async createClassroom(classroom: any) {
      try {
        const response = await axiosInstance.post('/classroom', classroom)
        console.log(response)
      } catch (error) {
        console.warn(error)
      }
    },

    async deleteClassroom(classroomId: number) {
      try {
        const response = await axiosInstance.delete(`/classroom/${classroomId}`)
        this.classrooms = this.classrooms.filter((classroom: Classroom) => classroom.id !== classroomId)
        console.log('Classroom deleted successfully:', response)
      } catch (error) {
        console.error('Error deleting classroom:', error)
      }
    }
    
  }
})
