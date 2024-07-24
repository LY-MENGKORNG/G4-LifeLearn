<script setup lang="ts">
import OverviewCard from '@/Components/Common/Card/OverviewCard.vue'
import { ref, onMounted } from 'vue'
import Chart from 'chart.js/auto'
import { User } from '@element-plus/icons-vue'
import { useSystemStore } from '@/stores/system-store';
import UserList from '@/Components/Common/List/UserList.vue';



const systemStore = useSystemStore()
const dashboard = ref<any>({
	teachers: '',
	students: '',
	teacher_count: '',
	student_count: '',
})

let myChart: any
const renderChart = () => {
	const ctx = document.getElementById('myChart') as HTMLCanvasElement
	if (!ctx) return
	myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			datasets: [
				{
					label: dashboard.value.teacher_count + ' of Sales',
					data: [dashboard.value.teacher_count + 1, dashboard.value.teacher_count + 2, dashboard.value.teacher_count + 2],
					backgroundColor: '#86efac'
				},
				{
					label: dashboard.value.student_count + ' of Student',
					data: [dashboard.value.student_count + 3, dashboard.value.student_count + 3, dashboard.value.student_count + 5],
					backgroundColor: '#f9a8d4'
				},
				{
					label: dashboard.value.grade_count + ' of Orders',
					data: [dashboard.value.grade_count + 2, dashboard.value.grade_count + 2, dashboard.value.grade_count + 6],
					backgroundColor: '#fde047'
				},
				{
					label: dashboard.value.class_count + ' of Sold',
					data: [dashboard.value.class_count + 3, dashboard.value.class_count + 3, dashboard.value.class_count + 5],
					backgroundColor: '#5eead4'
				}
			]
		}
	})
}
onMounted(async () => {
	await systemStore.dashboard();
	dashboard.value = systemStore.dashboard
	await renderChart()
})
</script>
<template>
	<SystemLayout>
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4 w-full">
			<overview-card title="Total Teachers" :count='dashboard.teacher_count' bg="bg-green-300">
				<el-icon>
					<User />
				</el-icon>
			</overview-card>
			<overview-card title="Total Students" :count=dashboard.student_count bg="bg-pink-300">
				<el-icon>
					<User />
				</el-icon>
			</overview-card>
			<overview-card title="Total Grades" :count=dashboard.grade_count bg="bg-yellow-300">
				<el-icon>
					<User />
				</el-icon>
			</overview-card>
			<overview-card title="Total Classes" :count=dashboard.class_count bg="bg-teal-300">
				<el-icon>
					<User />
				</el-icon>
			</overview-card>
		</div>

		<!-- Chart Section -->
		<div class="grid grid-cols-1 md:grid-cols-2 gap-4  mb-7">
			<div class="bg-white h-auto shadow-md mt-3 rounded-se-sm p-4">
				<canvas id="myChart" class="h-30"></canvas>
			</div>
			<div class="text-center rounded p-4 mt-3 bg-white">
				<div class="flex items-center justify-between mb-4">
					<h6 class="mb-0">Recent Sales</h6>
					<a href="#" class="text-blue-500">Show All</a>
				</div>
				<div class="overflow-y-auto">
					<div class="border-yellow-300 rounded-sm overflow-x-hidden overflow-y-scroll">
						<UserList v-for="user in dashboard.users" :key="user.id" :profile="user.profile" :email="user.email"
							:fullName="user.first_name + ' ' + user.last_name" :roles="user.role" />
					</div>
				</div>
			</div>
		</div>
	</SystemLayout>
</template>

<style scoped>
/* Add scoped styles if necessary */
</style>
