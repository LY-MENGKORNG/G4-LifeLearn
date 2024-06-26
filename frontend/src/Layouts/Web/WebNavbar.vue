            
<script setup lang="ts">
import { Search } from '@element-plus/icons-vue'
import router from '@/router'
import UserProfile from '@/Components/Common/Profile/UserProfile.vue'
import AppLogo from '@/Components/Common/Logo/AppLogo.vue'


const currentRoute = router.router.currentRoute.value.fullPath;

let activeIndex = '1'

const navigations = [
    { id: 1, name: "Home", path: "/" },
    { id: 2, name: "My Learning", path: "/my-learn" },
    { id: 3, name: "Books", path: "/book" },
];
const handleSelect = (key: string, keyPath: string[]) => { }
const handleclick = (key: string, keyPath: string[]) => { }

const setCurrentRoute = () => {
    navigations.filter(navigation => {
        if (navigation.path == currentRoute) {
            activeIndex = navigation.id.toString()
        }
    });
}
setCurrentRoute()
</script>


<template>
    <el-container class="flex flex-col">
        <el-header class="flex justify-between items-center border border-bottom-1">
            <div>
                <app-logo />
            </div>
            <div class="flex relative items-center">
                <el-input  size="medium" placeholder="Search..." :suffix-icon="Search" />
            </div>
            <div class="flex gap-4 items-center">
                <el-badge :value="1" class="item" type="primary">
                    <el-button class="border-none h-[27px] w-[27px] rounded-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 1024 1024">
                            <path fill="currentColor" d="M512 64a64 64 0 0 1 64 64v64H448v-64a64 64 0 0 1 64-64" />
                            <path fill="currentColor"
                                d="M256 768h512V448a256 256 0 1 0-512 0zm256-640a320 320 0 0 1 320 320v384H192V448a320 320 0 0 1 320-320" />
                            <path fill="currentColor"
                                d="M96 768h832q32 0 32 32t-32 32H96q-32 0-32-32t32-32m352 128h128a64 64 0 0 1-128 0" />
                        </svg>
                    </el-button>
                </el-badge>
                <user-profile />
            </div>
        </el-header>
        <el-menu :default-active="activeIndex" class="el-menu-demo flex justify-center h-[40px]" mode="horizontal"
            @select="handleSelect">
            <el-menu-item class="flex items-center justify-center" v-for="navigation in navigations" :key="navigation.id" @click="handleclick"
                :index="navigation.id.toString()">
                <router-link class="no-underline flex items-center text-slate-700 w-[100%] h-[100%]" :to="navigation.path">
                    {{ navigation.name }}
                </router-link>
            </el-menu-item>
        </el-menu>
    </el-container>
</template>
