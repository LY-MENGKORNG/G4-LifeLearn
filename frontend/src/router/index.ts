import { createRouter, createWebHistory } from 'vue-router'
import axiosInstance from '@/plugins/axios'
import { useAuthStore } from '@/stores/auth-store'
import { createAcl, defineAclRules } from 'vue-simple-acl'
import routes from './routes'
import { ref } from 'vue';

const page = ref<string>('/login')
const simpleAcl = createAcl({})
const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
});


router.beforeEach(async (to: any, from: any, next: any) => {
    page.value = to.path.includes('/system') ? '/system/login' : to.path
    const publicPages = [page.value]
    const authRequired = !publicPages.includes(to.path)
    const store = useAuthStore()

    try {
        const { data } = await axiosInstance.get('/me')
        store.isAuthenticated = true
        store.user = data.data

        store.permissions = data.permissions.map((item: any) => item.name)
        store.roles = data.roles.map((item: any) => item.name)

        const rules = () =>
            defineAclRules((setRule) => {
                store.permissions.forEach((permission: string) => {
                    setRule(permission, () => true)
                })
            })

        simpleAcl.rules = rules()
    } catch (error) {
        /* empty */
        // console.warn(error)
    }

    if (authRequired && !store.isAuthenticated) {
        next(page.value)
    } else {
        next()
    }
});

export default { router, simpleAcl }
