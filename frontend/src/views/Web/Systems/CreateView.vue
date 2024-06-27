<template>
    <WebLayout>
        <div class="bg-slate-100">
            <div class="container flex justify-center ">
                <div class="w-full max-w-xl ">
                    <!-- form payment -->
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-8 mt-8">
                        <div class="mb-9">
                            <h1 class="text-2xl text-start text-teal-400">PAYMENT INFORMATION</h1>
                            <hr class="mt-2 border-t-2 border-gray-500">
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="countries"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment</label>
                                <select id="countries"
                                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 border-none">
                                    <option selected>Choose a payment</option>
                                    <option value="US">United States</option>
                                    <option value="CA">Canada</option>
                                    <option value="FR">France</option>
                                    <option value="DE">Germany</option>
                                </select>
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs text-start mb-2"
                                    for="expiration-date">Expiration Date</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="expiration-date" type="text" placeholder="MM/YY">
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs text-start mb-2"
                                    for="card-number">Card Number</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="card-number" type="text" placeholder="*******">
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs text-start mb-2"
                                    for="security-code">Security Code</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="security-code" type="text" placeholder="******">
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs text-start mb-2"
                                    for="security-code">Date</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="security-code" type="text" placeholder="******">
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs text-start mb-2"
                                    for="security-code">Amount</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="security-code" type="text" placeholder="******">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="countries"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                    option method</label>
                                <select id="countries"
                                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 border-none">
                                    <option selected>Choose a method</option>
                                    <option value="US">ABA</option>
                                    <option value="CA">AMk</option>
                                    <option value="CA">ACLEDA</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-6 flex items-center justify-between">
                            <div class="flex items-center">
                                <input checked id="checkbox-1" type="checkbox" value=""
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-1"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember
                                    me</label>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-12 rounded focus:outline-none border-0"
                                type="button">Save</button>
                            <router-link to="/system">
                                <el-button class="fornt-bold hover:gray-500 py-4 px-10  text-1.5xl">Cancel</el-button>
                            </router-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </WebLayout>
</template>
<script setup lang="ts">
import WebLayout from '@/Layouts/Web/WebLayout.vue';
</script>