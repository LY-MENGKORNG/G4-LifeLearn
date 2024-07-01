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
    },
    {
        path: '/system/classroom',
        name: 'system-classroom',
        component: () => import('@/views/System/ClassroomView.vue')
    },
    {
        path: '/system/material',
        name: 'system-material',
        component: () => import('@/views/System/MaterialView.vue')
    },
    {
        path: '/system/peopl',
        name: 'system-people',
        component: () => import('@/views/System/PeopleView.vue')
    },
    {
        path: '/system/missing',
        name: 'system-missing',
        component: () => import('@/views/System/MissingView.vue')
    },
    
    {
        path: '/system/done',
        name: 'system-done',
        component: () => import('@/views/System/DoneView.vue')
    },
    {
        path: '/system/homework',
        name: 'system-homework',
        component: () => import('@/views/System/HomeworkView.vue')
    },
    {
        path: '/system/lesson',
        name: 'system-lesson',
        component: () => import('@/views/System/LessonView.vue')
    },

]

export default routes;