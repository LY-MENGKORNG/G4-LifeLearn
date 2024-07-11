
<template>

<el-menu
			:default-active="activeIndex"
			class="el-menu-demo flex justify-center h-[40px] sticky top-0 left-0 z-50 shadow-md shadow-slate-50/30"
			mode="horizontal"
			@select="handleSelect"
		>
			<el-menu-item
				class="flex items-center justify-center"
				v-for="navigation in navigations"
				:key="navigation.id"
				@click="handleclick"
				:index="navigation.id.toString()"
			>
				<router-link
					class="no-underline flex flex-1 items-center text-slate-700 w-[100%] h-[100%]"
					:to="navigation.path"
				>
					{{ navigation.name }}
				</router-link>
			</el-menu-item>
		</el-menu>
</template>

<script setup lang="ts">
import {ref, onMounted } from "vue";
import router from '@/router'

const currentRoute = router.router.currentRoute.value.fullPath
const activeIndex = ref('null')

onMounted(() => {
  setCurrentRoute();
})

const navigations = [
	{ id: 1, name: 'Home', path: '/' },
	{ id: 2, name: 'My Learning', path: '/my-learn' },
	{ id: 3, name: 'Books', path: '/book' }
]
const handleSelect = (key: string, keyPath: string[]) => {}
const handleclick = (key: string, keyPath: string[]) => {}

const setCurrentRoute = () => {
	navigations.filter((navigation) => {
		if (navigation.path == currentRoute) {
			activeIndex.value = navigation.id.toString()
		}
	})
}
</script> 