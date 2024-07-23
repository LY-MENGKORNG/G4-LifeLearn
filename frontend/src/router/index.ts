import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '@/stores/auth-store'
import routes from './routes'
import { ref } from 'vue';

const page = ref<string>('/login')
const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
});


router.beforeEach(async (to: any, from: any, next: any) => {
    page.value = to.path.includes('/system') || to.path.includes('/request-payment') ? '/system/login' : to.path
    const publicPages = [page.value]
    const authRequired = !publicPages.includes(to.path)
    const store = useAuthStore()

    try {
        await store.fetchUser();
    } catch (error) { }
    if (to.meta.requireAuth && !store.user.isAuthenticated) {
        store.user.isAuthenticated = true;
        next(page.value)
    } else {
        next()
    }
});

export default { router }
