<script setup lang="ts">
import WebNavbar from './WebNavbar.vue';
import WebFooter from './WebFooter.vue';
import WebHeaderMenu from './WebHeaderMenu.vue';
</script>

<template>
    <div class="common-layout bg-white min-h-screen">
        <el-container class="flex flex-col justify-between relative">
            <WebNavbar></WebNavbar>
            <web-header-menu />
            <el-main  class="p-0">
                <slot></slot>
            </el-main>
            <WebFooter></WebFooter>
        </el-container>
    </div>
</template>