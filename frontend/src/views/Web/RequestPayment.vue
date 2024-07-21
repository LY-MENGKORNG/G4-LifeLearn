<template>
	<div class="flex justify-center max-w-2xl shadow-md mx-auto items-center min-h-screen bg-gray-100">
	
		
		<form @submit.prevent="submitForm" class="w-140 p-6 rounded-lg  ">
		<div class="py-6">
			<h2 class="font-medium text-xl text-center mb-4">Sending your document reference to admin</h2>
		</div>
        <div class="flex flex-col mb-4">
            <label for="school_name" class="mb-2 font-semibold text-gray-700">School Name:</label>
            <el-input
                name="school_name"
                type="text"
                v-model="form.school_name"
                id="school_name"
                required
                class="border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-[#42b883]"
            />
        </div>
        <div class="flex flex-col mb-4 mt-3">
            <label for="school_address" class="mb-2 font-semibold text-gray-700">School Address:</label>
            <el-input
                name="school_address"
                type="text"
                v-model="form.school_address"
                id="school_address"
                required
                class="border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-[#42b883]"
            />
        </div>
        <div class="flex flex-col mb-4 mt-3">
            <label for="description" class="mb-2 font-semibold text-gray-700">Description:</label>
            <el-input
                name="description"
                type="textarea"
                v-model="form.description"
                id="description"
                required
                class="border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-[#42b883]"
            />
        </div>
        <div class="flex flex-col mb-4 mt-3">
            <label for="reference" class="mb-2 font-semibold text-gray-700">Reference:</label>
            <input
                type="file"
                name="reference[]"
                id="reference"
                multiple
                @change="handleFileUpload"
                class="block w-full border border-gray-300 shadow-sm rounded-md text-sm focus:z-10 focus:border-[#42b883] focus:ring-[#42b883] disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4 dark:file:bg-neutral-700 dark:file:text-neutral-400"
            />
        </div>
        <button type="submit" class="mt-3 w-full bg-[#42b883] text-white rounded-md py-2">
            Submit
        </button>
    </form>
</div>

</template>
  
<script setup lang="ts">
import { ref, onMounted } from 'vue'
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

const submitForm = async () => {
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
		message: 'This is a success message',
		type: 'success'
	})
}
</script>