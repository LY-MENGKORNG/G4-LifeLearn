<script setup lang="ts">
import UserProfile from '@/Components/Common/Profile/UserProfile.vue'
import AppLogo from '@/Components/Common/Logo/AppLogo.vue'
import { Search } from '@element-plus/icons-vue'
import { ref, onMounted } from 'vue'
import { useAuthStore } from '@/stores/auth-store'
import axiosInstance from '@/plugins/axios';
import router from '@/router'
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'

const authStore = useAuthStore()

const profile = ref()
const currentRoute = router.router.currentRoute.value.fullPath
let activeIndex = '1'

onMounted(async () => {
	await authStore.fetchUser()
	profile.value = authStore.user.data.profile
})

const navigations = [
	{ id: 1, name: 'Home', path: '/' },
	{ id: 2, name: 'My Learning', path: '/my-learn' },
	{ id: 3, name: 'Books', path: '/book' }
]

const dropdownMenu = [
	{ id: 1, name: 'Account settings', path: '/system/profile' },
	{ id: 2, name: 'Sign out', path: '/logout' }
]

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
				<el-badge :value="1" class="item" type="primary">
					<el-button class="border-none h-[27px] w-[27px] rounded-circle">
						<svg
							xmlns="http://www.w3.org/2000/svg"
							width="1.5em"
							height="1.5em"
							viewBox="0 0 1024 1024"
						>
							<path
								fill="currentColor"
								d="M512 64a64 64 0 0 1 64 64v64H448v-64a64 64 0 0 1 64-64"
							/>
							<path
								fill="currentColor"
								d="M256 768h512V448a256 256 0 1 0-512 0zm256-640a320 320 0 0 1 320 320v384H192V448a320 320 0 0 1 320-320"
							/>
							<path
								fill="currentColor"
								d="M96 768h832q32 0 32 32t-32 32H96q-32 0-32-32t32-32m352 128h128a64 64 0 0 1-128 0"
							/>
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
				<Menu as="div" class="relative inline-block text-left z-50">
					<div>
						<MenuButton>
							<user-profile
								:Src="profile == null ? './src/assets/avatar/avatar-profile.jpg' : profile"
							/>
						</MenuButton>
					</div>

					<transition
						enter-active-class="transition ease-out duration-100"
						enter-from-class="transform opacity-0 scale-95"
						enter-to-class="transform opacity-100 scale-100"
						leave-active-class="transition ease-in duration-75"
						leave-from-class="transform opacity-100 scale-100"
						leave-to-class="transform opacity-0 scale-95"
					>
						<MenuItems
							class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
						>
							<div class="py-1">
								<MenuItem v-slot="{ active }">
									<a
										href="#"
										:class="[
											active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
											'block px-4 py-2 text-sm'
										]"
										>Account settings</a
									>
								</MenuItem>
								<MenuItem v-slot="{ active }">
									<a
										href="#"
										:class="[
											active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
											'block px-4 py-2 text-sm'
										]"
										>Support</a
									>
								</MenuItem>
								<MenuItem v-slot="{ active }">
									<a
										href="#"
										:class="[
											active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
											'block px-4 py-2 text-sm'
										]"
										>License</a
									>
								</MenuItem>
								<form method="POST" action="#">
									<MenuItem v-slot="{ active }">
										<button
											type="submit"
											:class="[
												active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
												'block w-full px-4 py-2 text-left text-sm'
											]"
										>
											Sign out
										</button>
									</MenuItem>
								</form>
							</div>
						</MenuItems>
					</transition>
				</Menu>
			</div>
		</el-header>
	</el-container>
</template>
