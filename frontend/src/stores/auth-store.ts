import type User from '@/Constants/api-constants'
import axiosInstance from '@/plugins/axios';
import { createAcl, defineAclRules } from 'vue-simple-acl'
import { defineStore } from 'pinia'
import { ref } from 'vue'
const simpleAcl = createAcl({})


const USER: User = {
    profile: {
        id: null,
        firstName: '',
        lastName: '',
        email: '',
        password: '',
        phone: '',
        profile: ''
    },
    permissions: [],
    roles: [],
    isAuthenticated: false,
}

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: ref<User>(USER),
    }),
    actions: {
        async fetchUser() {
            try {
                const response = await axiosInstance.get('/me', {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('access_token')}`
                    }
                });
                const rules = () =>
                    defineAclRules((setRule) => {
                        this.user.permissions.forEach((permission: string) => {
                            setRule(permission, () => true)
                        })
                    })

                simpleAcl.rules = rules()

                this.user = response.data;
                this.user.isAuthenticated = true
            } catch (error) {
                console.error('Something went wrong:', error);
            }
        },
        async login() {
            
        }
    }
})
