import 'bootstrap/dist/css/bootstrap.min.css' // Import Bootstrap CSS
import './assets/main.css'
import 'element-plus/dist/index.css'
import 'uno.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { configure } from 'vee-validate'

import router from './router'
import ElementPlus from 'element-plus'
import axios from './plugins/axios'

import App from './App.vue'
import WebLayout from '@/Layouts/Web/WebLayout.vue'
import SystemLayout from './Layouts/System/SystemLayout.vue'

const app = createApp(App)

configure({
  validateOnInput: true
})

app.use(createPinia())
app.use(router.router)
app.use(ElementPlus)

app.config.globalProperties.$axios = axios

app.component('WebLayout', WebLayout)
app.component('SystemLayout', SystemLayout)

app.mount('#app')
