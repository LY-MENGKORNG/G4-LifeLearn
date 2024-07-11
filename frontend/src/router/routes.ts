    const userMeta = {
    requireAuth: false,
    role: 'user'
}
const principleMeta = {
    requireAuth: true,
    role: 'principle'
}

const routes = [
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
        path: '/system/schedule',
        name: 'system-schedule',
        component: () => import('@/views/System/ScheduleView.vue'),
        meta: principleMeta
    },
    {
        path: '/system/teacher',
        name: 'system-teacher',
        component: () => import('@/views/System/TeacherView.vue'),
        meta: principleMeta
    },
    {
        path: '/system/student',
        name: 'system-student',
        component: () => import('@/views/System/StudentView.vue'),
        meta: principleMeta
    },

    {
        path: '/system/setting',
        name: 'system-setting',
        component: () => import('@/views/System/SettingView.vue'),
        meta: principleMeta
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
        path: '/logout',
        name: 'logout',
        component: () => import('@/views/Web/Auth/LogoutView.vue')
    },

    {
        path: '/forgot-password',
        name: 'forgot-password',
        component: () => import('@/views/Auth/ResetPassword.vue')
    },
    {
        path: '/reset-password',
        name: 'reset-password',
        component: () => import('@/views/Auth/ResetPassword.vue')
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
        path: '/book/add',
        name: 'book-add',
        component: () => import('@/views/Web/Books/AddBook.vue')
    },
    {
        path: '/system',
        name: 'system',
        component: () => import('@/views/Web/SystemView.vue'),
        props: true
    },
    {
        path: '/system/create',
        name: 'system-create',
        component: () => import('@/views/Web/Systems/CreateView.vue'),
        props: true
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
        path: '/system/people',
        name: 'system-people',
        component: () => import('@/views/System/PeopleView.vue')
    },
    {
        path: '/system/missing',
        name: 'system-missing',
        component: () => import('@/views/System/MissingView.vue')
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
    ,
    {
        path: '/system/payment',
        name: 'system-payment',
        component: () => import('@/views/Web/Payments/PrinciplePayment.vue')
    },
    {
        path: '/system/bookpayment',
        name: 'system-bookpayment',
        component: () => import('@/views/Web/Bookpayments/UserPaymentView.vue')
    },
    {
        path: '/system/info',
        name: 'system-info',
        component: () => import('@/views/Web/Info/SystemInfo.vue')
    },
    {
        path: '/system/class',
        name: 'system-class',
        component: () => import('@/views/System/ClassesView.vue')
    },
    {
        path: '/system/missing',
        name: 'system-missing',
        component: () => import('@/views/System/MissingView.vue')
    },
    {
        path: '/system/liststudent',
        name: 'system-liststudent',
        component: () => import('@/views/System/ListStudent.vue')
    },
    {
        path: '/system/done',
        name: 'system-done',
        component: () => import('@/views/System/DoneView.vue')
    },
    {
        path: '/system/grade',
        name: 'system-grade-list',
        component: () => import('@/views/System/Classroom/NewGrade.vue'),
    },
    {
        path: '/system/grade/:id',
        name: 'system-grade-detail',
        component: () => import('@/views/System/Grade/ShowGrade.vue'),
        props: true
    },
    
    {
        path: '/system/lesson',
        name: 'system-lesson',
        component: () => import('@/views/System/LessonView.vue')
    },
    {
        path: '/system/submitform',
        name: 'system-submitform',
        component: () => import('@/views/System/SubmitformView.vue')
    },
]

export default routes;