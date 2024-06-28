const routes = [
    {
        path: '/admin/dashboard',
        name: 'dashboard',
        component: () => import('@/views/Admin/DashboardView.vue'),
        meta: {
            requiresAuth: true,
            role: 'admin'
        }
    },
    {
        path: '/admin/login',
        name: 'admin-login',
        component: () => import('@/views/Admin/Auth/LoginView.vue')
    },
    {
        path: '/',
        name: 'home',
        component: () => import('@/views/Web/HomeView.vue')
    },
    {
        path: '/book',
        name: 'book',
        component: () => import('@/views/Web/BookView.vue')
    },

    {
        path: '/system',
        name: 'system',
        component: () => import('@/views/Web/SystemView.vue'),
        props: true
    },
    {
        path: '/system/register',
        name: 'system-register',
        component: () => import('@/views/System/Auth/RegisterView.vue'),
        props: true
    },
    {
        path: '/system/create',
        name: 'system-create',
        component: () => import('@/views/Web/Systems/CreateView.vue'),
        props: true
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