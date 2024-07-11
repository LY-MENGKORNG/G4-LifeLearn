<script setup lang="ts">
import { useField, useForm } from 'vee-validate'
import * as yup from 'yup'
import { ref } from 'vue'
import { ElMessage, ElMessageBox } from 'element-plus'
import type { UploadProps, UploadUserFile } from 'element-plus'
import { UploadFilled } from '@element-plus/icons-vue'
import router from '@/router'
import { useSystemStore } from '@/stores/system-store'

import { ElNotification } from 'element-plus'

const systemStore = useSystemStore()

const responseMessage = ref<string>('')

const openSuccessRequest = () => {
	ElNotification.success({
		title: 'Success',
		message: responseMessage.value,
		offset: 5
	})
}

const fileList = ref<UploadUserFile[]>([])

const uploadedFiles = ref<UploadUserFile[]>([])

const handleRemove: UploadProps['onRemove'] = (file, uploadFiles) => { }

const handlePreview: UploadProps['onPreview'] = (uploadFile) => { }

const handleExceed: UploadProps['onExceed'] = (files, uploadFiles) => {
	ElMessage.warning(
		`The limit is 3, you selected ${files.length} files this time, add up to ${
			files.length + uploadFiles.length
		} totally`
	)
}

const beforeRemove: UploadProps['beforeRemove'] = (uploadFile, uploadFiles) => {
	return ElMessageBox.confirm(`Cancel the transfer of ${uploadFile.name} ?`).then(
		() => true,
		() => false
	)
}

const handleUpload = ({ file, onSuccess }) => {
	uploadedFiles.value.push(file)
	console.log('Uploaded Files:', uploadedFiles.value[0])
	onSuccess(null, file)
}

const formSchema = yup.object({
	school_name: yup.string().required().label('school_name'),
	school_address: yup.string().required().label('school_address'),
	description: yup.string().label('description')
})

const { handleSubmit, isSubmitting } = useForm({
	initialValues: {
		school_name: '',
		school_address: '',
		description: ''
	},
	validationSchema: formSchema
})

const onSubmit = handleSubmit(async (values) => {
	console.log(fileList.value)
	const request = values
	request.reference = uploadedFiles.value;
	console.log(request.reference[0]);
	await systemStore.sendRequest(request);
	responseMessage.value = systemStore.message;
	
	openSuccessRequest();

	// setTimeout(() => {
	// 	router.router.push('/');
	// }, 3000)
})

const { value: school_name, errorMessage: schoolNameError } = useField('school_name')
const { value: school_address, errorMessage: schoolAddressError } = useField('school_address')
const { value: description, errorMessage: descriptionError } = useField('description')

</script>


<template>
	<input type="file"  @change="test">
	<el-container class="flex flex-col items-center bg-white h-screen">
		<p class="text-green-500 font-medium text-xl">{{ responseMessage }}</p>
		<div class="my-auto">
			<h2 class="mb-5 font-bold text-2xl text-teal-400 text-start">Request for Payment</h2>
			<el-form @submit.prevent="() => { console.log('Form submitted'); onSubmit(); }">
				<div class="flex gap-3 w-full my-2">
					<el-form-item>
						<label for="school_name">School Name</label>
						<el-input
							:error="schoolNameError"
							id="school_name"
							type="text"
							class="w-full"
							placeholder="Please enter school name"
							v-model="school_name"
						/>
					</el-form-item>
					<el-form-item>
						<label for="school_address">School Address</label>
						<el-input
							:error="schoolAddressError"
							id="school_address"
							type="text"
							class="w-full"
							placeholder="Please enter school address"
							v-model="school_address"
						/>
					</el-form-item>
				</div>
				<div class="flex">
					<label for="description">Description</label>
					<el-input
						id="description"
						:error="descriptionError"
						v-model="description"
						placeholder="Your description"
						type="textarea"
					/>
				</div>
				<div>
					<span>Your references</span>
					<el-upload
						id="references"
						v-model:file-list="fileList"
						class="upload-demo my-2 border border-dashed p-3 rounded-md"
						multiple
						:on-preview="handlePreview"
						:on-remove="handleRemove"
						:before-remove="beforeRemove"
						:limit="3"
						:on-exceed="handleExceed"
						:http-request="handleUpload"
						accept=".pdf"
						list-type="picture"
					>
						<el-icon class="el-icon--upload"><upload-filled /></el-icon>
						<div class="el-upload__text">
							Drop file your references here or <em class="text-blue-600">click to upload</em>
						</div>
						<template #tip>
							<div class="el-upload__tip">pdf files</div>
						</template>
					</el-upload>
				</div>

				<el-button
					:disabled="isSubmitting"
					native-type="submit"
					class="w-full mt-3 bg-teal-500 hover:bg-teal-500 active:bg-teal-600 text-white"
					>Send</el-button
				>
				<router-link to="/" class="text-center">Back to home</router-link>
			</el-form>
		</div>
	</el-container>
</template>

