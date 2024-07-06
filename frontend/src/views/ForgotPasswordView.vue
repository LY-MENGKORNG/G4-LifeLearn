<template>
	<!-- <form @submit.prevent="onSubmit" method="post">
		<el-form-item :error="emailError" class="mt-5">
			<label for="email">Email</label>
			<el-input id="email" v-model="email" />
		</el-form-item>

		<el-button
			:disabled="isSubmitting"
			native-type="submit"
			class="w-full mt-3 bg-teal-500 hover:bg-teal-500 active:bg-teal-600 text-white"
			>Sign Up</el-button
		>
	</form> -->
	<!-- component -->
	<main id="content" role="main" class="w-full max-w-md mx-auto p-6">
		<div class="mt-7 bg-white rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700">
			<div class="p-4 sm:p-7">
				<div class="text-center">
					<h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Forgot password?</h1>
					<p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
						Remember your password?
						<router-link
							class="text-blue-600 decoration-2 hover:text-blue-500 font-medium"
							to="/login"
						>
							Login here
						</router-link>
					</p>
				</div>

				<div class="mt-5">
					<form @submit.prevent="onSubmit">
						<div>
							<div class="relative">
								<el-form-item :error="emailError" class="mt-5">
									<label for="email">Email Address</label>
									<el-input id="email" v-model="email" />
								</el-form-item>
							</div>
							<p class="hidden text-xs text-red-600 mt-2" id="email-error">
								Please include a valid email address so we can get back to you
							</p>
						</div>
						<el-button
							:disabled="isSubmitting"
							native-type="submit"
							class="w-full mt-3 bg-teal-500 hover:bg-teal-500 active:bg-teal-600 text-white"
							>Sign Up</el-button
						>
					</form>
				</div>
			</div>
		</div>
	</main>
</template>

<script setup lang="ts">
import { useAuthStore } from '@/stores/auth-store'
import * as yup from 'yup'
import { useField, useForm } from 'vee-validate'

const store = useAuthStore()

const formSchema = yup.object({
	email: yup.string().required().email().label('Email address')
})

const { handleSubmit, isSubmitting } = useForm({
	initialValues: {
		email: ''
	},
	validationSchema: formSchema
})

const onSubmit = handleSubmit((values) => store.resetPassword(values))
const { value: email, errorMessage: emailError } = useField('email')
</script>
