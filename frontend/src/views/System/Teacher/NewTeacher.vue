<template>
  <div
  class="mx-auto mt-10 block max-w-screen-sm rounded-lg bg-white p-6 shadow-4 dark:bg-surface-dark">
  <div class="flex justify-center items-center mb-5">
  <h1 class="title text-2xl font-bold">Please input your email</h1>
  </div>
  <form>
    <p class="mb-3">You need to input your email to school priciple add you into system.</p>
    <!--E-mail input-->
    <div class="relative mb-6" data-twe-input-wrapper-init>
      <input
        type="email"
        class="peer block min-h-[auto] w-full rounded border-1 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
        id="exampleInputEmail2"
        aria-describedby="emailHelp"
        placeholder="Enter email" />
      <label
        for="exampleInputEmail2"
        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-300 dark:peer-focus:text-primary"
        >Email address</label
      >
    </div>
    <el-form-item>
        <el-button @click="cancelForm">Cancel</el-button>
        <el-button type="primary" @click="submitForm">Submit</el-button>
      </el-form-item>
  </form>
</div>
</template>

<script setup lang="ts">
</script>
<style>

</style>