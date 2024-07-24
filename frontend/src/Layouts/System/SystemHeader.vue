<template>
	<el-header class="flex items-center justify-between bg-white sticky top-0 right-0">
		<el-button @click="action" class="border-none">
			<Fold size="15px" />
		</el-button>
 
		<Menu as="div" class="relative inline-block text-left">
			<div class="flex gap-4 items-center">
				<div class="el-badge item">
					<button aria-disabled="false" type="button" plain @click="drawer = true"
						class="el-button border-none h-[27px] w-[27px] rounded-circle ml-auto">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
								viewBox="0 0 1024 1024">
								<path fill="currentColor" d="M512 64a64 64 0 0 1 64 64v64H448v-64a64 64 0 0 1 64-64">
								</path>
								<path fill="currentColor"
									d="M256 768h512V448a256 256 0 1 0-512 0zm256-640a320 320 0 0 1 320 320v384H192V448a320 320 0 0 1 320-320">
								</path>
								<path fill="currentColor"
									d="M96 768h832q32 0 32 32t-32 32H96q-32 0-32-32t32-32m352 128h128a64 64 0 0 1-128 0">
								</path>
							</svg>
						</span>
					</button>
					<sup class="el-badge__content el-badge__content--primary is-fixed">5</sup>
					<SystemNotification  v-model="drawer"  />
				</div>
				<MenuButton>
					<SystemProfile :src="profile"  />
				</MenuButton>
			</div>

			<transition enter-active-class="transition ease-out duration-100"
				enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
				leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100"
				leave-to-class="transform opacity-0 scale-95">
				<MenuItems
					class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
					<div class="py-1">
						<MenuItem v-slot="{ active }" v-for="item in dropdownMenu" :key="item.id">
						<router-link :to="item.path" :class="[
							active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
							'block px-4 py-2 text-sm'
						]">{{ item.name }}</router-link>
						</MenuItem>
					</div>
				</MenuItems>
			</transition>
		</Menu>
	</el-header>
</template>

<script setup lang="ts">
import SystemProfile from '@/Components/Common/Profile/SystemProfile.vue'
import { Fold } from '@element-plus/icons-vue'
import { ElMessage } from 'element-plus'
import { defineProps, ref } from 'vue'
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import SystemNotification from '@/Components/Common/Notification/SystemNotification.vue'

const drawer = ref(false)
const props = defineProps({
	profile: String,
	action: Function
})

const dropdownMenu = [
	{ id: 1, name: 'Account settings', path: '/system/profile' },
	{ id: 2, name: 'Sign In', path: '/system/login' },
	{ id: 3, name: 'Sign out', path: '/logout' }
]

const showCodeBlock = ref(false)

const toggleCodeBlock = () => {
	showCodeBlock.value = !showCodeBlock.value // Toggle the value of showCodeBlock
}
</script>
