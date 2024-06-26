<script setup lang="ts">
import AdminSideBar from './AdminSideBar.vue'
</script>

<template>
    <div class="common-layout">
        <el-container>
            <admin-side-bar></admin-side-bar>
            <div class="flex flex-col w-screen">
                <el-header class="bg-red-500">Header</el-header>
                <div class="flex">
                    <!-- <el-aside class="bg-slate-400 h-screen">Aside</el-aside> -->
                    <el-main>
                        <slot></slot>
                    </el-main>
                </div>
            </div>
        </el-container>
    </div>
</template>