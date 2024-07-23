<template>
	<SystemLayout>
		<div class="flex justify-between items-center">
			<h2 class="text-xl">Teacher List</h2>
			<button
				@click="openModal"
				class="py-2 px-4 rounded-md bg-green-400 hover:bg-green-400/80 active:bg-green-400/60 transition-all"
			>
				Invite
			</button>
			<SendMail :open="showModal" @close="closeModal" />
		</div>
		<ul role="list" class="divide-y-2 bg-white mt-3">
			<UserList
				v-for="person in people"
				:key="person.email"
				:fullName="person.name"
				:email="person.email"
				:role="person.role"
				:lastSeen="person.lastSeen"
				:profile="person.imageUrl"
			/>
		</ul>
	</SystemLayout>
</template>

<script setup lang="ts">
import UserList from '@/Components/Common/List/UserList.vue'
import SystemLayout from '@/Layouts/System/SystemLayout.vue'
import SendMail from '@/Components/Common/Form/SendMail.vue'
import { onMounted, ref } from 'vue'
import { useSystemStore } from '@/stores/system-store'

const systemStore = useSystemStore()
const showModal = ref(false)
const openModal = () => {
	showModal.value = true
}

const closeModal = () => {
	showModal.value = false
}

onMounted(async () => {
	await systemStore.fetchUsers('teacher')
	console.log(systemStore.users)
})

const people = [
	{
		name: 'Leslie Alexander',
		email: 'leslie.alexander@example.com',
		role: 'Co-Founder / CEO',
		imageUrl:
			'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
		lastSeen: '3h ago',
		lastSeenDateTime: '2023-01-23T13:23Z'
	},
	{
		name: 'Michael Foster',
		email: 'michael.foster@example.com',
		role: 'Co-Founder / CTO',
		imageUrl:
			'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
		lastSeen: '3h ago',
		lastSeenDateTime: '2023-01-23T13:23Z'
	},
	{
		name: 'Dries Vincent',
		email: 'dries.vincent@example.com',
		role: 'Business Relations',
		imageUrl:
			'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
		lastSeen: null
	}
]
</script>