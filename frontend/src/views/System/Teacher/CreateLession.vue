<template>
  <SystemLayout>
    <div class="flex justify-center">
      <div
        class="w-full max-w-screen-md block rounded-lg bg-white p-6 shadow-4 dark:bg-surface-dark"
      >
        <el-form
          ref="ruleFormRef"
          :model="ruleForm"
          status-icon
          :rules="rules"
          label-width="auto"
          class="demo-ruleForm"
        >
          <div class="flex justify-center items-center mb-5">
            <h1 class="title text-2xl font-bold">Create Lession</h1>
          </div>
          <el-form-item prop="title">
            <el-input v-model="ruleForm.name" autocomplete="off" placeholder="Title" />
          </el-form-item>
          <el-form-item prop="description">
            <el-input type="textarea" v-model="ruleForm.description" placeholder="Description" />
          </el-form-item>
          <el-upload
            class="upload-demo"
            drag
            action="https://run.mocky.io/v3/9d059bf9-4660-45f2-925d-ce80ad6c4d15"
            multiple
          >
            <el-icon class="el-icon--upload"><upload-filled /></el-icon>
            <div class="el-upload__text">Drop file here or <em>click to upload</em></div>
            <template #tip>
              <div class="el-upload__tip">jpg/png files with a size less than 500kb</div>
            </template>
          </el-upload>
          <el-form-item class="flex flex-col">
            <el-button class="w-32" @click="cancelForm">Cancel</el-button>
            <el-button class="w-32" type="primary" @click="submitForm(ruleFormRef)"
              >Create</el-button
            >
          </el-form-item>
        </el-form>
      </div>
    </div>
  </SystemLayout>
</template>

<script lang="ts" setup>
import SystemLayout from '@/Layouts/System/SystemLayout.vue'
import { reactive, ref } from 'vue'
import { UploadFilled } from '@element-plus/icons-vue'
import type { FormInstance, FormRules } from 'element-plus'

const ruleFormRef = ref<FormInstance>()

const validateName = (rule: any, value: any, callback: any) => {
  if (value === '') {
    callback(new Error('Please input the title'))
  } else {
    callback()
  }
}

const validateDescription = (rule: any, value: any, callback: any) => {
  if (value === '') {
    callback(new Error('Please input the description'))
  } else {
    callback()
  }
}

const ruleForm = reactive({
  title: '',
  description: ''
})

const rules = reactive<FormRules<typeof ruleForm>>({
  title: [{ validator: validateName, trigger: 'blur' }],
  description: [{ validator: validateDescription, trigger: 'blur' }]
})

const submitForm = (formEl: FormInstance | undefined) => {
  if (!formEl) return
  formEl.validate((valid) => {
    if (valid) {
      console.log('submit!')
    } else {
      console.log('error submit!')
    }
  })
}
const cancelForm = () => {
  ruleForm.title = ''
  ruleForm.description = ''
  console.log('Form cancelled')
}
</script>
