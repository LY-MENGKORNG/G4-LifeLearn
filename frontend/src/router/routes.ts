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
        path: '/register',
        name: 'register',
        component: () => import('@/views/Web/Auth/RegisterView.vue')
    },
    {
        path: '/login',
        name: 'login',
        component: () => import('@/views/Web/Auth/LoginView.vue')
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
    }
    ,
    {
        path: '/teacher-logout',
        name: 'teacher-logout',
        component: () => import('@/Components/teacherLogout.vue')
    }
]

export default routes;