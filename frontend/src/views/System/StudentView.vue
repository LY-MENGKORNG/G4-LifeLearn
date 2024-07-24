<template>
	<SystemLayout>
		<div class="flex justify-between items-center">
			<h2 class="text-xl">Student List</h2>
			<button @click="openModal"
				class="py-2 px-4 rounded-md bg-green-400 hover:bg-green-400/80 active:bg-green-400/60 transition-all">
				Invite
			</button>
			<SendMail :open="showModal" @close="closeModal" />
		</div>
		<ul role="list" class="divide-y-2 bg-white mt-3">
			<UserList v-for="student in students" :key="student.email"
				:fullName="`${student.first_name} ${student.last_name}`" :email="student.email" :roles="student.role"
				:lastSeen="student.last_seen" :profile="student.profile" />
		</ul>
	</SystemLayout>
</template>

<script setup lang="ts">
import UserList from '@/Components/Common/List/UserList.vue'
import SendMail from '@/Components/Common/Form/SendMail.vue'
import { onMounted, ref } from 'vue'
import { useSystemStore } from '@/stores/system-store'

const systemStore = useSystemStore()
const showModal = ref(false)
const students = ref();

const openModal = () => {
	showModal.value = true
}

const closeModal = () => {
	showModal.value = false
}

onMounted(async () => {
	await systemStore.fetchUsers('/system/students')
	students.value = systemStore.users;
	if(students.value){
		closeModal();
	}
})

</script>