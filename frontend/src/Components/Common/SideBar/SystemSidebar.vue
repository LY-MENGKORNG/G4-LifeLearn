<template>
	<el-menu
		default-active="2"
		class="el-menu-vertical-demo h-screen bg-slate-800 text-white *:text-white z-10"
		:collapse="isCollapse"
		@open="handleOpen"
		@close="handleClose"
	>

		<el-menu-item index='0'  @click="setRoute('/system/dashboard')" class="hover:bg-slate-600">
			<el-icon>
				<IconMenu />
			</el-icon>
			<template #title>Dashboard</template>
		</el-menu-item>

		<el-menu-item v-for="nav in navigations" :key="nav.id" :index='(nav.id + 1).toString()'  @click="setRoute(nav.path)" class="hover:bg-slate-600">
			<el-icon>
				<IconMenu />
			</el-icon>
			<template #title>{{ nav.name }}</template>
		</el-menu-item>
	</el-menu>
</template>

<script setup lang="ts">
import { DataBoard, Document, Menu as IconMenu, Location, Setting } from '@element-plus/icons-vue'
import AppLogo from '@/Components/Common/Logo/AppLogo.vue'
import { defineProps, toRefs } from 'vue'
import router from '@/router'

const props = defineProps({
	isCollapse: Boolean,
	handleOpen: Function,
	handleClose: Function
})
const { isCollapse, handleOpen, handleClose } = toRefs(props)

const setRoute = (path: string) => {
    router.router.push(path)
}

const navigations = [
    {id: 1, name: 'Grade', path: '/system/grade'},
    {id: 2, name: 'Teacher', path: '/system/teacher'},
    {id: 3, name: 'Student', path: '/system/student'},
    {id: 4, name: 'Schedule', path: '/system/schedule'},
    {id: 5, name: 'Setting', path: '/system/setting'},
];

</script>


<style>
.el-menu-vertical-demo:not(.el-menu--collapse) {
	width: 200px;
}
</style>
