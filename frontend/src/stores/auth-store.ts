import type User  from '@/Constants/api-constants'
import axiosInstance from '@/plugins/axios';
import { createAcl, defineAclRules } from 'vue-simple-acl'
import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: ref<User>(),
    }),
    actions: {
        async fetchUser() {
            try {
                const response = await axiosInstance.get('/me', {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('access_token')}`
                    }
                });
                this.user = response.data;
                this.user.isAuthenticated = true
            } catch (error) {
                console.error('Something went wrong:', error);
            }
        }
    }
})
