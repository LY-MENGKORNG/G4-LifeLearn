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
        path: '/home',
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
    
    // {
    //     path: '/system/create/score',
    //     name: 'system-create-score',
    //     component: () => import('@/views/System/Teacher/Score.vue')
    // },
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
    },
    {
        path: '/teacher-logout',
        name: 'teacher-logout',
        component: () => import('@/Components/teacherLogout.vue')
    },

    
    {
        path: '/request-payment',
        name: 'request-payment',
        component: () => import('@/views/Web/RequestPayment.vue'),
        meta: principleMeta
    },
    {
        path: '/systems/payment',
        name: 'systems-payment',
        component: () => import('@/views/Web/Payments/PrinciplePayment.vue'),
    },
    {
        path: '/systems/payment',
        name: 'systems-payment',
        component: () => import('@/views/Web/Payments/PrinciplePayment.vue'),
    },
    {
        path: '/payment/success',
        name: 'system-success',
        component: () => import('@/views/Web/Payments/SuccessPaid.vue')
    },
    {
        path: '/systems/info',
        name: 'systems-info',
        component: () => import('@/views/Web//SystemInfoView.vue')
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
        path: '/system/score',
        name: 'system-score-list',
        component: () => import('@/views/System/Classroom/Score.vue'),
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
        path: '/system/homework',
        name: 'system-lesson',
        component: () => import('@/views/System/HomeworkView.vue')
    },
    {
        path: '/system/submitform/:id',
        name: 'system-submitform',
        component: () => import('@/views/System/SubmitformView.vue'),
        props: true
    },
    {
        path: '/system/profile',
        name: 'system-profile',
        component: () => import('@/views/System/Profile/ViewProfile.vue')
    },
    {
        path: '/system/edit/profile',
        name: 'system-edit-profile',
        component: () => import('@/views/System/Profile/EditProfile.vue')
    },
    {
        path: '/system/create/quiz',
        name: 'system-create-quiz',
        component: () => import('@/views/System/Teacher/QuizCreate.vue')
    },
    
    {
        path: '/',
        name: 'welcomepage',
        component: () => import('@/views/Web/WelcomeView.vue'),
       
    },

{
        path:'/user/profile' ,
        name: 'user-profile',
        component: () => import('@/views/Web/UserProfileView.vue')
    }
]

export default routes;