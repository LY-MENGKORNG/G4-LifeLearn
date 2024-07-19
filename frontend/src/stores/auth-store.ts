import type User from '@/Constants/api-constants'
import axiosInstance from '@/plugins/axios';
import { createAcl, defineAclRules } from 'vue-simple-acl'
import { defineStore } from 'pinia'
import { ref } from 'vue'
import router from '@/router'
const simpleAcl = createAcl({})


const USER: User = {
    data: {
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
                const response = await axiosInstance.get('/me');
                const rules = () =>
                    defineAclRules((setRule) => {
                        this.user.permissions.forEach((permission: string) => {
                            setRule(permission, () => true)
                        })
                    })

                simpleAcl.rules = rules()

                this.user = response.data;
                this.user.isAuthenticated = true;
            } catch (error) { }
        },
        async login(values: { email: string, password: string }, route: string) {
            try {
                const { data } = await axiosInstance.post(route, values)
                localStorage.setItem('access_token', data.access_token)

                this.fetchUser();

                let isUser = true;
                this.user.roles.map((role: any) => {
                    if (role.name != 'user') {
                        isUser = false;
                    }
                });
                return isUser
            } catch (error) {
                console.warn("You didn't login yet!")
            }
        },

        async resetPassword(values: { email: string }) {
            try {
                const { data } = await axiosInstance.post('/forgot-password', values)
                router.router.push('/forgot-password')
            } catch (error) {
                return error
            }
        },

        async editPrfile(profile: any) {
            try {
                await axiosInstance.post('/edit-profile', profile);
            } catch (error) {
                console.warn(error)
            }
        },

        async logout() {
            try {
                const response = await axiosInstance.post('/logout');
                console.log(response)
            } catch (error) {
                console.warn(error)
            }
        }
    }
})
