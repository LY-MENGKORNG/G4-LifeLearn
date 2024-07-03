const userMeta = {
    requireAuth: false,
    role: 'user'
}
const adminMeta = {
    requireAuth: true,
    role: 'admin'
}
const principleMeta = {
    requireAuth: true,
    role: 'principle'
}

const routes = [
    {
        path: '/admin/dashboard',
        name: 'dashboard',
        component: () => import('@/views/Admin/DashboardView.vue'),
        meta: adminMeta
    },
    {
        path: '/admin/login',
        name: 'admin-login',
        component: () => import('@/views/Admin/Auth/LoginView.vue')
    },
    {
        path: '/system/login',
        name: 'system-login',
        component: () => import('@/views/System/Auth/LoginView.vue')
    },
    {
        path: '/login',
        name: 'login',
        component: () => import('@/views/Web/Auth/LoginView.vue'),
    },


    {
        path: '/system/dashboard',
        name: 'system-dashboard',
        component: () => import('@/views/System/DashboardView.vue'),
        meta: principleMeta
    },


    {
        path: '/register',
        name: 'register',
        component: () => import('@/views/Web/Auth/RegisterView.vue')
    },
    {
        path: '/',
        name: 'home',
        component: () => import('@/views/Web/HomeView.vue'),
        meta: userMeta
    },
    {
        path: '/book',
        name: 'book',
        component: () => import('@/views/Web/BookView.vue'),
        meta: {
            requiresAuth: false,
            role: 'user'
        }
    },
    {
        path: '/system',
        name: 'system',
        component: () => import('@/views/Web/SystemView.vue')
    },
    {
        path: '/course',
        name: 'course',
        component: () => import('@/views/Web/CourseView.vue')
    },
    {
        path: '/favorite',
        name: 'favorite',
        component: () => import('@/views/Web/FavoriteView.vue')
    },
    {
        path: '/my-learn',
        name: 'my-learn',
        component: () => import('@/views/Web/MyLearnView.vue')
    },
]

export default routes;