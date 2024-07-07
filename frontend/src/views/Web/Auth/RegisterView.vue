<template>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-green-400 to-blue-500">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Register</h2>
            <el-form @submit.prevent="onSubmit" label-width="0">
                <el-row :gutter="20">
                    <el-col :span="12">
                        <el-form-item :error="firstNameError">
                            <el-input v-model="first_name" placeholder="First Name"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="12">
                        <el-form-item :error="lastNameError">
                            <el-input v-model="last_name" placeholder="Last Name"></el-input>
                        </el-form-item>
                    </el-col>
                </el-row>
                <el-form-item :error="emailError">
                    <el-input v-model="email" placeholder="Your Email"></el-input>
                </el-form-item>
                <el-form-item :error="passwordError">
                    <el-input v-model="password" placeholder="Password" show-password></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button :disabled="isSubmitting" native-type="submit"
                        class="w-full mt-3 bg-teal-500 hover:bg-teal-500 active:bg-teal-600 text-white">Create
                        Account</el-button>
                </el-form-item>
            </el-form>
            <p class="text-center mt-4">Already have an account? <router-link to="/login" class="text-blue-500">Log in
                    now!</router-link></p>
        </div>
    </div>
</template>

<script setup lang="ts">
import axiosInstance from '@/plugins/axios'
import { useField, useForm } from 'vee-validate'
import * as yup from 'yup'
import { useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth-store'
import { createAcl, defineAclRules } from 'vue-simple-acl'
import router from '@/router/index'

const store = useAuthStore()


const formSchema = yup.object({
    first_name: yup.string().required().label('First Name'),
    last_name: yup.string().required().label('Last Name'),
    email: yup.string().required().email().label('Email address'),
    password: yup.string().required().label('Password'),
})

const { handleSubmit, isSubmitting } = useForm({
    initialValues: {
        first_name: '',
        last_name: '',
        password: '',
        email: ''
    },
    validationSchema: formSchema
})

const onSubmit = handleSubmit(async (values) => {
    try {
        const { data } = await axiosInstance.post('/register', values)
        router.router.push('/login')
    } catch (error) {
        console.log(error)
    }
})

const { value: password, errorMessage: passwordError } = useField('password')
const { value: email, errorMessage: emailError } = useField('email')
const { value: first_name, errorMessage: firstNameError } = useField('first_name')
const { value: last_name, errorMessage: lastNameError } = useField('last_name')
</script>
