<template>
    <div class="">
        <div class="flex bg-white rounded-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
            <div class="hidden lg:block lg:w-2/4 bg-cover object-contain"
                style="background-image:url('https://img.freepik.com/free-photo/online-payment-security-concept-3d-phone-bill_107791-16722.jpg?t=st=1719890415~exp=1719894015~hmac=7fd111ac923f9ca01afccd5ac56cf4b73428829259cf0149f6ad6d318491cd13&w=740'); background-position: center">
            </div>
            <div class="w-full p-8 lg:w-2/4">
                <div class="max-w-lg mx-auto">
                    <div class="text-center mb-6">
                        <h2 class="text-3xl md:text-4xl font-extrabold">Register</h2>
                    </div>
                    <form @submit.prevent="handleSubmit">
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block mb-2 font-extrabold" for="firstname">First Name</label>
                                <el-input id="firstname" v-model="firstname" type="text" placeholder="First Name" />
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block mb-2 font-extrabold" for="lastname">Last Name</label>
                                <el-input id="lastname" v-model="lastname" type="text" placeholder="Last Name" />
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 font-extrabold" for="email">Email</label>
                            <el-input id="email" v-model="email" type="email" placeholder="Email Address" />
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 font-extrabold" for="password">Password</label>
                            <el-input id="password" v-model="password" type="password" placeholder="Password" />
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 font-extrabold" for="phone">Phone</label>
                            <el-input id="phone" v-model="phone" type="tel" placeholder="Phone Number" />
                        </div>
                        
                        <div class="mb-6">
                            <router-link to="">
                                <el-button
                                    class="bg-teal-500 px-13 text-white fornt-bold hover:gray-500 py-2 px-44  text-1.5xl">Save</el-button>
                            </router-link>
                            <p class="mt-4">Already have an account? <router-link to="/login" class="text-blue-500">Login</router-link></p>
                        </div>
                        <div class="mb-6">
                            <router-link to="">
                                <el-button
                                    class="text-black-400 hover:text-white border border-green-400 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-27 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                                    <svg class="h-8 w-6 text-teal-700  mr-2" width="24" height="28" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
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
import { ref } from 'vue';

const firstname = ref('');
const lastname = ref('');
const email = ref('');
const password = ref('');
const phone = ref('');

const handleSubmit = () => {
    // Add form submission logic 
    console.log({ firstname, lastname, email, password, phone });
};
</script>

