<template>
  <div class="flex justify-center items-center h-screen">
    <div class="w-full max-w-screen-md block  rounded-lg bg-white p-6 shadow-4 dark:bg-surface-dark h-96">
      <el-form
        ref="ruleFormRef"
        :model="ruleForm"
        status-icon
        :rules="rules"
        label-width="auto"
        class="demo-ruleForm"
      >
        <div class="flex justify-center items-center mb-5">
          <h1 class="title text-2xl font-bold">Create new Classroom</h1>
        </div>
        <el-form-item  prop="name">
          <el-input v-model="ruleForm.name" autocomplete="off" placeholder="Name" />
        </el-form-item>
        <el-form-item   prop="description" >
          <el-input type="textarea" v-model="ruleForm.description" placeholder="Description" />
        </el-form-item>
        <el-form-item class="flex flex-col">
          <el-button class="w-32" type="primary" @click="submitForm(ruleFormRef)">Submit</el-button>
        </el-form-item>
      </el-form>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { reactive, ref } from 'vue'
import type { FormInstance, FormRules } from 'element-plus'

const ruleFormRef = ref<FormInstance>()

const validateName = (rule: any, value: any, callback: any) => {
  if (value === '') {
    callback(new Error('Please input the name'))
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
  name: '',
  description: ''
})

const rules = reactive<FormRules<typeof ruleForm>>({
  name: [{ validator: validateName, trigger: 'blur' }],
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


</script>
