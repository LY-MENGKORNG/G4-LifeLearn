<template>
	<div class="common-layout">
		<el-container>
			<SystemSidebar
				:handle-open="handleOpen"
				:is-collapse="isCollapse"
				:handle-close="handleClose"
				:systemName="system.name"
			/>
			<div class="flex flex-col w-screen sticky left-0 top-0">
				<SystemHeader
					:profile="'http://localhost:8000/images/' + owner.profile"
					:action="setCollapse"
					:image="avatar"
				/>
				<div class="flex">
					<el-main>
						<slot></slot>
					</el-main>
				</div>
			</div>
		</el-container>
	</div>
</template>

<script setup lang="ts">
import SystemSidebar from './SystemSidebar.vue'
import SystemHeader from './SystemHeader.vue'
import { onMounted, ref } from 'vue'
import avatar from '@/assets/avatar/avatar-profile.jpg'
import { useSystemStore } from '@/stores/system-store'

const systemStore = useSystemStore()

const system = ref({
	id: '',
	owner: {
		id: null,
		firstName: '',
		lastName: '',
		email: '',
		phone: '',
		profile: ''
	},
	location: '',
	name: ''
})

const owner = ref({
	id: null,
	firstName: '',
	lastName: '',
	email: '',
	phone: '',
	profile: ''
})

onMounted(async () => {
	await systemStore.fetchSystem()
	system.value = systemStore.system
	owner.value = system.value.owner
})

const isCollapse = ref<boolean>(false)
const setCollapse = () => {
	isCollapse.value = !isCollapse.value
}
const handleOpen = (key: string, keyPath: string[]) => {}
const handleClose = (key: string, keyPath: string[]) => {}
</script>