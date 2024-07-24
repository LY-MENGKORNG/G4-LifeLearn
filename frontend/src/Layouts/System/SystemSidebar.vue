<template>
	<el-menu
		:default-active="activeIndex"
		class="el-menu-vertical-demo h-screen bg-slate-800 text-white *:text-white z-10 sticky top-0 left-0"
		:collapse="isCollapse"
		@open="handleOpen"
		@close="handleClose"
	>
		<el-menu-item index="0" @click="setRoute('/system/dashboard')" class="hover:bg-slate-600 space-x-2">
			<img :src="logo" class="h-10 w-10" alt="" >
			<template #title>
				<h2 class="text-xl font-medium text-white overflow-hidden " >
					{{systemName}}
				</h2>
			</template>
		</el-menu-item>

		<el-menu-item
			v-for="nav in navigations"
			v-show="nav.isTeacher"
			:key="nav.id"
			:index="nav.id.toString()"
			@click="setRoute(nav.path)"
			class="hover:bg-slate-600"
		>
			<el-icon>
				<component :is="nav.icon" />
			</el-icon>
			<template #title>
				{{ nav.name }}
			</template>
		</el-menu-item>
	</el-menu>
</template>
  
<script setup lang="ts"> 
import logo from "@/assets/app-logo.png"
import router from '@/router'
import {
	DataBoard,
	Document,
	Menu as IconMenu,
	Location,
	Setting,
	Calendar,
	Avatar,
	UserFilled
} from '@element-plus/icons-vue'
import { defineProps, ref, toRefs } from 'vue'

const navigations = [
	{
		id: 1,
		name: 'Dashboard',
		path: '/system/dashboard',
		icon: IconMenu,
		isPrinciple: true,
		isTeacher: true
	},
	{
		id: 2,
		name: 'Grade',
		path: '/system/grade',
		icon: Document,
		isPrinciple: true,
		isTeacher: true
	},
	{
		id: 3,
		name: 'Teacher',
		path: '/system/teacher',
		icon: Avatar,
		isPrinciple: true,
		isTeacher: true
	},
	{
		id: 4,
		name: 'Student',
		path: '/system/student',
		icon: UserFilled,
		isPrinciple: true,
		isTeacher: true
	},
	{
		id: 5,
		name: 'Schedule',
		path: '/system/schedule',
		icon: Calendar,
		isPrinciple: true,
		isTeacher: true
	},
	{
		id: 6,
		name: 'Setting',
		path: '/system/setting',
		icon: Setting,
		isPrinciple: true,
		isTeacher: true
	}
]

const currentRoute = router.router.currentRoute.value.fullPath
let activeIndex = ref('1')
const setCurrentRoute = () => {
	console.log(activeIndex.value)
	navigations.filter((navigation) => {
		if (navigation.path == currentRoute) {
			activeIndex.value = navigation.id.toString()
		}
	})
}
setCurrentRoute()

const setRoute = (path: string) => {
	router.router.push(path)
}

defineProps<{
	isCollapse: Boolean
	handleOpen: Function
	handleClose: Function
	systemName?: string
}>()
</script>
  
  <style>
.el-menu-vertical-demo:not(.el-menu--collapse) {
	width: 200px;
}
</style>
  