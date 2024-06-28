<template>
    <WebLayout>
        <div class="bg-slate-100">
            <div class="container flex justify-center ">
                <div class="w-full max-w-xl ">
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-8 mt-8">
                        <div class="mb-9">
                            <h1 class="text-2xl text-start text-teal-400">PAYMENT INFORMATION</h1>
                            <hr class="mt-2 border-t-2 border-gray-500">
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="payment"
                                    class="block mb-2 text-sm  text-gray-900 dark:text-white">Payment</label>
                                <el-select id="payment" type="payment" placeholder="Payment" clearable>
                                    <el-option label="Zone one" value="shanghai" />
                                    <el-option label="Zone two" value="beijing" />
                                </el-select>
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs text-start mb-2"
                                    for="expiration">Expiration Date</label>
                                <el-input id="expiration" type="expiration" />
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs text-start mb-2"
                                    for="card-number">Card Number</label>
                                <el-input id="card-number" type="card-number" />
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs text-start mb-2"
                                    for="security">Security Code</label>
                                <el-input id="security" type="security" />
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs text-start mb-2"
                                    for="date">Date</label>
                                <el-date-picker type="date" id="date" placeholder="Pick a date" clearable />
                            </div>

                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs text-start mb-2"
                                    for="amount">Amount</label>
                                <el-input id="amount" type="number" />
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="method" class="block mb-2 text-sm  text-gray-900 dark:text-white">Select an
                                    method</label>
                                <el-select id="method" type="select" placeholder="Activity zone" clearable>
                                    <el-option label="ABA" value="shanghai" />
                                    <el-option label="ACILIDA" value="beijing" />
                                </el-select>
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs text-start mb-2"
                                    for="reference">Referent</label>
                                <el-input id="reference" type="file" />
                            </div>
                        </div>
                        <div class="mb-6 flex items-center justify-between">
                            <div>
                                <el-checkbox label="Remember me" size="large" />
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <router-link to="">
                                <el-button
                                    class="bg-teal-500 px-13 text-white fornt-bold hover:gray-500 py-4 px-10  text-1.5xl">Save</el-button>
                            </router-link>
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