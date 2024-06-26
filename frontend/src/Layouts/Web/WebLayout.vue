<script setup lang="ts">
import WebNavbar from './WebNavbar.vue';
import WebFooter from './WebFooter.vue';
</script>

<template>
    <div class="common-layout bg-white min-h-screen">
        <el-container class="flex flex-col justify-between">
            <WebNavbar class=""></WebNavbar>
            <el-main  class="">
                <slot></slot>
            </el-main>
            <WebFooter class="bg-slate-200"></WebFooter>
        </el-container>
    </div>
</template>