<script setup lang="ts">
import UserProfile from '@/Components/Common/Profile/UserProfile.vue'
import AppLogo from '@/Components/Common/Logo/AppLogo.vue'
import BaseButton from '@/Components/Base/BaseButton.vue'
import WebHeaderMenu from './WebHeaderMenu.vue'
import { Search } from '@element-plus/icons-vue'
import { ref, onMounted } from 'vue'
import { useAuthStore } from '@/stores/auth-store'
import axiosInstance from '@/plugins/axios';
import router from '@/router'
import type { DropdownInstance } from 'element-plus'
import { ElDialog } from 'element-plus'

const dropdown1 = ref<DropdownInstance>()
function handleVisible2(visible: any) {
	if (!dropdown1.value) return
	if (visible) {
		dropdown1.value.handleClose()
	} else {
		dropdown1.value.handleOpen()
	}
}
function showClick() {
	if (!dropdown1.value) return
	dropdown1.value.handleOpen()
}

const authStore = useAuthStore()

const profile = ref('')
const currentRoute = router.router.currentRoute.value.fullPath
let activeIndex = '1'
const toggleMenu = ref(false)

onMounted(async () => {
	await authStore.fetchUser()
	profile.value = authStore.user.data.profile
})

const navigations = [
	{ id: 1, name: 'Home', path: '/' },
	{ id: 2, name: 'My Learning', path: '/my-learn' },
	{ id: 3, name: 'Books', path: '/book' }
]
const showMenu = () => {
	toggleMenu.value = !toggleMenu.value
}

const handleSelect = (key: string, keyPath: string[]) => { }
const handleclick = (key: string, keyPath: string[]) => { }

const setCurrentRoute = () => {
	navigations.filter((navigation) => {
		if (navigation.path == currentRoute) {
			activeIndex = navigation.id.toString()
		}
	})
}
setCurrentRoute();

const notificationDialogVisible = ref(false)

const showNotification = () => {
	notificationDialogVisible.value = true
}
const notificationlist = ref([]);
onMounted(async () => {
  try {
    const { data } = await axiosInstance.get('/user/notifications');
    notificationlist.value = data.data;
	console.log(notificationlist.value)
  } catch (error) {
    console.error('Error fetching books:', error);
  }
});
</script>

<template>
	<el-container class="flex flex-col">
		<el-header class="flex justify-between items-center border border-bottom-1">
			<div>
				<app-logo />
			</div>
			<div class="flex relative items-center">
				<el-input size="large" placeholder="Search..." :suffix-icon="Search" />
			</div>
			<div class="flex gap-4 items-center">
				<router-link to="/login">
					<base-button class="bg-teal-400 text-white hover:bg-teal-400 active:bg-teal-500" text="Sign in" />
				</router-link>
				<el-badge :value="5" class="item" type="primary">
					<el-button @click="showNotification" class="border-none h-[27px] w-[27px] rounded-circle">
						<svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 1024 1024">
							<path fill="currentColor" d="M512 64a64 64 0 0 1 64 64v64H448v-64a64 64 0 0 1 64-64" />
							<path fill="currentColor"
								d="M256 768h512V448a256 256 0 1 0-512 0zm256-640a320 320 0 0 1 320 320v384H192V448a320 320 0 0 1 320-320" />
							<path fill="currentColor"
								d="M96 768h832q32 0 32 32t-32 32H96q-32 0-32-32t32-32m352 128h128a64 64 0 0 1-128 0" />
						</svg>
					</el-button>
				</el-badge>
				<el-dialog v-model="notificationDialogVisible" title="Notifications">
					<div class="p-2">
						<h3 class="text-sm font-medium text-muted-foreground dark:text-muted mb-3">Today</h3>
						<div class="space-y-4" v-for="notification in notificationlist" :key="notification.id">
							<div class="flex items-start space-x-3 mb-3">
								<img class="w-8 h-8 rounded-full" src="https://i.pinimg.com/564x/3d/de/f0/3ddef0fc2c011f22b616afe111addcdf.jpg" alt="user-avatar" />
								<div class="flex-1">
									<p class="text-sm"><span class="font-semibold"></span> {{ notification.description }}</p>
								</div>
								<span class="text-xs text-muted-foreground dark:text-muted">{{ notification.created_at }}</span>
							</div>
						</div>
					</div>
				</el-dialog>

				<!-- =====profile==== -->
				<button @click="showMenu">
					<user-profile :Src="profile == '' ? './src/assets/avatar/avatar-profile.jpg' : profile" />
					<el-dropdown ref="dropdown1" trigger="contextmenu" style="margin-right: 30px">
						<span class="el-dropdown-link"> Dropdown List1 </span>
						<template #dropdown>
							<el-dropdown-menu>
								<el-dropdown-item>Action 1</el-dropdown-item>
								<el-dropdown-item>Action 2</el-dropdown-item>
								<el-dropdown-item>Action 3</el-dropdown-item>
								<el-dropdown-item disabled>Action 4</el-dropdown-item>
								<el-dropdown-item divided>Action 5</el-dropdown-item>
							</el-dropdown-menu>
						</template>
					</el-dropdown>
				</button>
			</div>
		</el-header>
	</el-container>
</template>
