<template>
    <div class="">
        <div class="flex bg-white rounded-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
            <div class="hidden lg:block lg:w-2/4 bg-cover object-contain "
                style="background-image:url('https://maveninsights.com/wp-content/uploads/2020/08/strategy-into-operations-3-1525x1536.jpg'); background-position: center">
            </div>
            <div class="w-full p-8 lg:w-2/4">
                <div class="max-w-lg mx-auto">
                    <div class="text-center mb-6">
                        <h2 class="text-3xl md:text-4xl font-extrabold">Register for Free</h2>
                        <p>Enter your information to register</p>
                    </div>
                    <form action="">
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block mb-2 font-extrabold" for="firstname">FristName</label>
                                <el-input id="firstname" type="firstname" placeholder="first name" />
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block mb-2 font-extrabold" for="lastname">LastName</label>
                                <el-input id="lastname" type="lastname" placeholder="last name" />
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 font-extrabold" for="email">Email</label>
                            <el-input id="email" type="email" placeholder="email address" />
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 font-extrabold" for="password">Password</label>
                            <el-input id="password" type="password" placeholder="password" />
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 font-extrabold" for="phone">Phone</label>
                            <el-input id="phone" type="number" placeholder="phone" />
                        </div>
                        <div class="mb-6">
                            <router-link to="">
                                <el-button
                                    class="bg-teal-500 px-13 text-white fornt-bold hover:gray-500 py-2 px-44  text-1.5xl">Save</el-button>
                            </router-link>
                            <p>Already have the account? <span class="text-blue-500">Login</span></p>
                        </div>

                        <div class="mb-6">
                            <router-link to="">
                                <el-button
                                    class="text-black-400 hover:text-white border border-green-400 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-27 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                                    <svg class="h-8 w-6 text-teal-700  mr-2" width="24" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M17.788 5.108A9 9 0 1021 12h-8" />
                                    </svg>
                                    Register with Google
                                </el-button>
                            </router-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
import WebLayout from '@/Layouts/Web/WebLayout.vue';
</script>
