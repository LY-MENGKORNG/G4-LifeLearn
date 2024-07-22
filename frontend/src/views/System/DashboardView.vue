<script setup lang="ts">
import OverviewCard from '@/Components/Common/Card/OverviewCard.vue'
import { ref, onMounted } from 'vue'
import Chart from 'chart.js/auto'
import { User } from '@element-plus/icons-vue'

const props = defineProps({
	msg: String
})
let myChart: any
function renderChart() {
	const ctx = document.getElementById('myChart') as HTMLCanvasElement
	if (!ctx) return
	myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['January', 'February', 'March'],
			datasets: [
				{
					label: '# of Sales',
					data: [1, 2, 2],
					backgroundColor: 'blue'
				},
				{
					label: '# of Customers',
					data: [3, 3, 5],
					backgroundColor: 'red'
				},
				{
					label: '# of Orders',
					data: [2, 2, 6],
					backgroundColor: 'green'
				},
				{
					label: '# of Sold',
					data: [3, 3, 5],
					backgroundColor: 'teal'
				}
			]
		}
	})
}
onMounted(() => {
	renderChart()
})
</script>
<template>
	<SystemLayout>
		<!-- Sales Summary Section -->
		<div class="  rounded p-4">
			<div class="flex items-center justify-between mb-4 h-10">
				<div>
					<h4 class="text-lg font-bold">Today's Sales</h4>
					<h6 class="text-sm text-gray-600">Sales Summary</h6>
				</div>
			</div>
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4 w-full">
				<overview-card title="Total Teachers" :count=20>
					<el-icon><User /></el-icon>
				</overview-card>
				<overview-card title="Total Students" :count=20>
					<el-icon><User /></el-icon>
				</overview-card>
				 
			</div>
		</div>

		<!-- Chart Section -->
		<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 mb-7">
			<div class="bg-white shadow-md rounded-se-sm p-4">
				<canvas id="myChart" class="h-44"></canvas>
			</div>
			<div class="text-center rounded p-4 bg-white">
				<div class="flex items-center justify-between mb-4">
					<h6 class="mb-0">Recent Sales</h6>
					<a href="#" class="text-blue-500">Show All</a>
				</div>
				<div class="border-yellow-300">
					<table class="table-auto w-full text-left align-middle border mb-0">
						<thead>
							<tr class="w-96">
								<th scope="col" class="px-4 py-2">
									<input type="checkbox" class="form-checkbox" />
								</th>
								<th scope="col" class="px-4 py-2">Date</th>
								<th scope="col" class="px-4 py-2">Customer</th>
								<th scope="col" class="px-4 py-2">Amount</th>
								<th scope="col" class="px-4 py-2">Status</th>
								<th scope="col" class="px-4 py-2">Action</th>
							</tr>
						</thead>
						<tbody>
							<tr class="border-b border-gray-300">
								<td class="px-4 py-2"><input type="checkbox" class="form-checkbox" /></td>
								<td class="px-4 py-2">01 Jan 2045</td>
								<td class="">
									<h6 class="mb-0 ml-3 text-body">Ashley Garrett</h6>
								</td>
								<td class="px-4 py-2">$123</td>
								<td class="px-4 py-2">Paid</td>
								<td class="px-4 py-2"><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
							</tr>
							<tr class="border-b border-gray-300">
								<td class="px-4 py-2"><input type="checkbox" class="form-checkbox" /></td>
								<td class="px-4 py-2">01 Jan 2045</td>
								<td class="px-4 py-2">John Doe</td>
								<td class="px-4 py-2">$123</td>
								<td class="px-4 py-2">Paid</td>
								<td class="px-4 py-2"><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
							</tr>
							<tr class="border-b border-gray-300">
								<td class="px-4 py-2"><input type="checkbox" class="form-checkbox" /></td>
								<td class="px-4 py-2">01 Jan 2045</td>
								<td class="px-4 py-2">John Doe</td>
								<td class="px-4 py-2">$123</td>
								<td class="px-4 py-2">Paid</td>
								<td class="px-4 py-2"><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
							</tr>
							<!-- Repeat the above <tr> for each row -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</SystemLayout>
</template>

<style scoped>
/* Add scoped styles if necessary */
</style>
