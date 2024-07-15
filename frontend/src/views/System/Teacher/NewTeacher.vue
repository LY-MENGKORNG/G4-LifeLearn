<template>
  <SystemLayout>
     <div class="flex justify-center ">
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
            <h1 class="title text-2xl font-bold">Please input your email</h1>
          </div>
          <p class="mb-3">You need to input your email to school priciple add you into system.</p>
          <!--E-mail input-->
          <div class="relative mb-6" data-twe-input-wrapper-init>
            <label for="">Email</label>
            <input
              type="email"
              class="peer block min-h-[auto] w-full rounded border-1 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
              id="exampleInputEmail2"
              aria-describedby="emailHelp"
              placeholder="Enter email"
            />
           
          </div>
          <el-form-item class="flex flex-col">
            <el-button @click="cancelForm">Cancel</el-button>
            <el-button  type="primary" @click="submitForm">Submit</el-button>
          </el-form-item>
         </el-form>
      </div>
    </div>
  </SystemLayout>
</template>

<script setup lang="ts">
import SystemLayout from '@/Layouts/System/SystemLayout.vue'
</script>
<style>
</style>