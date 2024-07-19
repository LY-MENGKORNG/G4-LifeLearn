<!-- src/components/Login.vue -->

<script setup lang="ts">
import axiosInstance from '@/plugins/axios'
import { useField, useForm } from 'vee-validate'
import * as yup from 'yup'
import { useAuthStore } from '@/stores/auth-store'
import router from '@/router'
const store = useAuthStore()

const formSchema = yup.object({
    password: yup.string().required().label('Password'),
    email: yup.string().required().email().label('Email address')
})

const { handleSubmit, isSubmitting } = useForm({
    initialValues: {
        password: '',
        email: ''
    },
    validationSchema: formSchema
})

const onSubmit = handleSubmit(async (values) => {
    
    const isUser = await store.login(values, '/system/login')
    
    router.router.push(!isUser ? '/system/dashboard' : '/home');
})

const { value: password, errorMessage: nameError } = useField('password')
const { value: email, errorMessage: emailError } = useField('email')
</script>

<template>
    <div class="flex justify-center max-w-4xl shadow-md mx-auto items-center min-h-screen bg-gray-100">
        <el-container class="flex flex-wrap m-auto">
            <el-form @submit="onSubmit" class="flex-1 h-screen p-10  text-start">
                <h2 class="text-2xl font-bold mb-6">Login</h2>
                <p>Don't have an account? <router-link to="/register">Create now</router-link></p>
                <el-form-item :error="emailError" class="mt-5">
                    <label for="email">Email</label>
                    <el-input id="email" v-model="email" />
                </el-form-item>
                <el-form-item :error="nameError" class="mt-2">
                    <label for="password" show-password>password</label>
                    <el-input id="password" type="password" v-model="password" show-password />
                </el-form-item>
                <el-button :disabled="isSubmitting" native-type="submit"
                    class="w-full mt-3 bg-teal-500 hover:bg-teal-500 active:bg-teal-600 text-white">Sign Up</el-button>
                <router-link to="/register">Go to register</router-link>
            </el-form>
            <el-card class="flex-1 h-screen p-10">

            </el-card>
        </el-container>
    </div>
</template>


<style scoped>
.min-h-screen {
    min-height: 100vh;
}
</style>
