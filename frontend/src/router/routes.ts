const routes = [
    {
        path: '/admin/dashboard',
        name: 'dashboard',
        component: () => import('../views/Admin/DashboardView.vue'),
        meta: {
            requiresAuth: true,
            role: 'admin'
        }
    },
    {
        path: '/login',
        name: 'login',
        component: () => import('../views/Admin/Auth/LoginView.vue')
    },
    {
        path: '/',
        name: 'home',
        component: () => import('../views/Web/HomeView.vue')
    },
    {
        path: '/book',
        name: 'book',
        component: () => import('../views/Web/Book/ListBookView.vue')
    }
]

export default routes;