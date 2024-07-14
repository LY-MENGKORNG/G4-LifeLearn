            
<script setup lang="ts">
import { Search } from '@element-plus/icons-vue'
import { ref, onMounted } from 'vue'
import { useAuthStore } from '@/stores/auth-store'

import UserProfile from '@/Components/Common/Profile/UserProfile.vue'
import AppLogo from '@/Components/Common/Logo/AppLogo.vue'
import BaseButton from '@/Components/Base/BaseButton.vue'
  
defineProps<{
	src: string,
}>()
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
				<user-profile :Src="src"  />
			</div>
		</el-header>
	</el-container>
</template>
