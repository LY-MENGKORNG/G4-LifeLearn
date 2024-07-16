<template>
	<el-upload
		v-model:file-list="fileList"
		class="upload-demo"
		multiple
		:on-preview="handlePreview"
		:on-remove="handleRemove"
		:before-remove="beforeRemove"
		:limit="3"
		:on-exceed="handleExceed"
		:http-request="handleUpload"
		accept=".jpg,.png,.pdf"
		list-type="picture"
	>
		<el-button type="primary">Click to upload</el-button>
		<template #tip>
			<div class="el-upload__tip">jpg/pdf/png files with a size less than 500kb</div>
		</template>
	</el-upload>
</template>

<script lang="ts" setup>
import { ref } from 'vue'
import { ElMessage, ElMessageBox } from 'element-plus'
import type { UploadProps, UploadUserFile } from 'element-plus'

const fileList = ref<UploadUserFile[]>([])

const uploadedFiles = ref<UploadUserFile[]>([])

const handleRemove: UploadProps['onRemove'] = (file, uploadFiles) => {
	console.log(file, uploadFiles)
}

const handlePreview: UploadProps['onPreview'] = (uploadFile) => {
	console.log(uploadFile)
}

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
	console.log('Uploaded Files:', uploadedFiles.value)
	onSuccess(null, file)
}
</script>
