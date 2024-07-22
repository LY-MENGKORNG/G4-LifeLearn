<template>
	<div class="h-screen flex flex-col justify-center items-center bg-white">
		<div class="py-6">
			<h2 class="font-medium text-xl">Sending your document reference to admin</h2>
		</div>

		<form @submit.prevent="submitForm" class="w-96">
			<div class="flex flex-col">
				<label for="school_name">School Name:</label>
				<el-input
					name="school_name"
					type="text"
					v-model="form.school_name"
					id="school_name"
					required
				/>
			</div>
			<div class="flex flex-col mt-3">
				<label for="school_address">School Address:</label>
				<el-input
					name="school_address"
					type="text"
					v-model="form.school_address"
					id="school_address"
					required
				/>
			</div>
			<div class="flex flex-col mt-3">
				<label for="description">Description:</label>
				<el-input
					name="description"
					type="textarea"
					v-model="form.description"
					id="description"
					required
				/>
			</div>
			<div class="flex flex-col mt-3">
				<label for="reference">Reference:</label>
				<input
					type="file"
					name="reference[]"
					id="reference"
					multiple
					@change="handleFileUpload"
					class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4 dark:file:bg-neutral-700 dark:file:text-neutral-400"
				/>
			</div>
			<button type="submit" class="mt-3 w-full bg-green-500 text-white rounded-md py-2">
				Submit
			</button>
		</form>
	</div>
</template>
 
<script setup lang="ts">
import { ref } from 'vue'
import router from '@/router'
import { ElNotification } from 'element-plus'
import { useSystemStore } from '@/stores/system-store'
const systemStore = useSystemStore()

const form = ref({
	school_name: '',
	school_address: '',
	description: '',
	reference: []
})
 
const handleFileUpload = (event: any) => {
	form.value.reference.push(Array.from(event.target.files))
}

const submitForm =  async () => {
	const data = new FormData()
	data.append('name', form.value.name)
	form.value.reference.forEach((file, index) => {
		data.append(`reference`, file)
	})

	try {
		const response = await systemStore.sendRequest(form.value)
		successMessage(response)
		setTimeout(() => {
			router.router.push('/')
		}, 3000)
	} catch (e) {}
}

const successMessage = (response: any) => {
	ElNotification({
		title: response,
		message: 'Your reference have already been sent! ',
		type: 'success'
	})
}
</script>