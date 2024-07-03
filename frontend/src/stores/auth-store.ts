import { defineStore } from 'pinia'
import { ref } from 'vue'

export default interface UserResponse {
    user: {
        firstName: string;
        lastName: string;
        email: string;
        password?: string;
        phone?: string;
        profile?: string
    };
    permissions: string[];
    roles: string[];
    message?: string; 
}

export const useAuthStore = defineStore('auth', () => {
    const user = ref<UserResponse>
    const isAuthenticated = ref<boolean>(false)
    const permissions = ref<string[]>([])
    const roles = ref<string[]>([])

    return {
        user,
        roles,
        permissions,
        isAuthenticated
    }
})
