            
<script setup lang="ts">
import { Search } from '@element-plus/icons-vue'
import { ref, onMounted } from 'vue'
import { useAuthStore } from '@/stores/auth-store'
import router from '@/router'
import UserProfile from '@/Components/Common/Profile/UserProfile.vue'
import AppLogo from '@/Components/Common/Logo/AppLogo.vue'
import BaseButton from '@/Components/Base/BaseButton.vue'
// import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
// import { ExclamationTriangleIcon } from '@heroicons/vue/outline';

const authStore = useAuthStore()

const profile = ref()
const currentRoute = router.router.currentRoute.value.fullPath
let activeIndex = '1'
const open = ref(true)

onMounted(async () => {
	await authStore.fetchUser()
	profile.value = authStore.user.data.profile
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
			activeIndex = navigation.id.toString()
		}
	})
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
				<el-input size="large" placeholder="Search..." :suffix-icon="Search" />
			</div>
			<div class="flex gap-4 items-center">
				<router-link to="/login">
					<base-button
						class="bg-teal-400 text-white hover:bg-teal-400 active:bg-teal-500"
						text="Sign in"
					/>
				</router-link>
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
				<!-- =====profile==== -->
				<el-button circle size="large" class="active:ring-1">
					<user-profile
						:Src="profile == null ? './src/assets/avatar/avatar-profile.jpg' : profile"
					/>
				</el-button>
				<!-- <TransitionRoot as="template" :show="open">
					<Dialog class="relative z-10" @close="open = false">
						<TransitionChild
							as="template"
							enter="ease-out duration-300"
							enter-from="opacity-0"
							enter-to="opacity-100"
							leave="ease-in duration-200"
							leave-from="opacity-100"
							leave-to="opacity-0"
						>
							<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
						</TransitionChild>

						<div class="fixed inset-0 z-10 w-screen overflow-y-auto">
							<div
								class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
							>
								<TransitionChild
									as="template"
									enter="ease-out duration-300"
									enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
									enter-to="opacity-100 translate-y-0 sm:scale-100"
									leave="ease-in duration-200"
									leave-from="opacity-100 translate-y-0 sm:scale-100"
									leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
								>
									<DialogPanel
										class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
									>
										<div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
											<div class="sm:flex sm:items-start">
												<div
													class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10"
												>
													<ExclamationTriangleIcon
														class="h-6 w-6 text-red-600"
														aria-hidden="true"
													/>
												</div>
												<div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
													<DialogTitle
														as="h3"
														class="text-base font-semibold leading-6 text-gray-900"
														>Deactivate account</DialogTitle
													>
													<div class="mt-2">
														<p class="text-sm text-gray-500">
															Are you sure you want to deactivate your account? All of your data
															will be permanently removed. This action cannot be undone.
														</p>
													</div>
												</div>
											</div>
										</div>
										<div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
											<button
												type="button"
												class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto"
												@click="open = false"
											>
												Deactivate
											</button>
											<button
												type="button"
												class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
												@click="open = false"
												ref="cancelButtonRef"
											>
												Cancel
											</button>
										</div>
									</DialogPanel>
								</TransitionChild>
							</div>
						</div>
					</Dialog>
				</TransitionRoot> -->
			</div>
		</el-header>
	</el-container>
</template>
