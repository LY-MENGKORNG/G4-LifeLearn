import { createRouter, createWebHistory } from 'vue-router'
import axiosInstance from '@/plugins/axios'
import { useAuthStore } from '@/stores/auth-store'
import { createAcl, defineAclRules } from 'vue-simple-acl'
import routes from './routes'


const simpleAcl = createAcl({})
const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
});

<<<<<<< HEAD
router.beforeEach(async (to, from, next) => {
    const publicPages = ['/admin/login']
    const authRequired = !publicPages.includes(to.path)
    const store = useAuthStore()
=======
// router.beforeEach(async (to, from, next) => {
//     const publicPages = ['/login']
//     const authRequired = !publicPages.includes(to.path)
//     const store = useAuthStore()
>>>>>>> ed0c52211f25dc31afe676cd8ca76ac4a6d2bd4b

//     try {
//         const { data } = await axiosInstance.get('/me')

//         store.isAuthenticated = true
//         store.user = data.data

//         store.permissions = data.data.permissions.map((item: any) => item.name)
//         store.roles = data.data.roles.map((item: any) => item.name)

//         const rules = () =>
//             defineAclRules((setRule) => {
//                 store.permissions.forEach((permission: string) => {
//                     setRule(permission, () => true)
//                 })
//             })

//         simpleAcl.rules = rules()
//     } catch (error) {
//         /* empty */
//     }

//     if (authRequired && !store.isAuthenticated) {
//         next('/login')
//     } else {
//         next()
//     }
// });

export default { router, simpleAcl }
