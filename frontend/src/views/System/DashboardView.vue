<template>
  <SystemLayout>
    <!-- Sales Summary Section -->
    <div class="bg-white shadow-md rounded p-4">
      <div class="flex items-center justify-between mb-4 h-10">
        <div>
          <h4 class="text-lg font-bold">Today's Sales</h4>
          <h6 class="text-sm text-gray-600">Sales Summary</h6>
        </div>
        <button class="flex items-center border-primary border-2 rounded-md py-2 px-4">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 mr-2">
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-width="1.5"
              d="M17 9.002c2.175.012 3.353.109 4.121.877C22 10.758 22 12.172 22 15v1c0 2.829 0 4.243-.879 5.122C20.243 22 18.828 22 16 22H8c-2.828 0-4.243 0-5.121-.878C2 20.242 2 18.829 2 16v-1c0-2.828 0-4.242.879-5.121c.768-.768 1.946-.865 4.121-.877"
            ></path>
            <path stroke-linejoin="round" d="M12 15V2m0 0l3 3.5M12 2L9 5.5"></path>
          </svg>
          Export
        </button>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
        <div class="p-3 bg-pink-200 rounded-md">
          <h3 class="text-4xl font-bold">$1k</h3>
          <p class="text-sm text-gray-600">Total Sales</p>
          <p class="text-xs text-green-600">Last day +8%</p>
        </div>
        <div class="p-3 bg-yellow-50 rounded-md">
          <h3 class="text-4xl font-bold">300</h3>
          <p class="text-sm text-gray-600">Total Order</p>
          <p class="text-xs text-green-600">Last day +5%</p>
        </div>
        <div class="p-3 bg-green-100 rounded-md">
          <h3 class="text-4xl font-bold">5</h3>
          <p class="text-sm text-gray-600">Sold</p>
          <p class="text-xs text-green-600">Last day +1.2%</p>
        </div>
        <div class="p-3 bg-purple-100 rounded-md">
          <h3 class="text-4xl font-bold">8</h3>
          <p class="text-sm text-gray-600">Customers</p>
          <p class="text-xs text-green-600">Last day +0.5%</p>
        </div>
      </div>
    </div>

    <!-- Chart Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 mb-7">
      <div class="bg-white shadow-md rounded-se-sm p-4">
        <canvas id="myChart" class="h-44"></canvas>
      </div>
      <div>
        <img
          src="https://img.freepik.com/premium-vector/vector-illustration-growing-money-investment-with-businessman-standing-with-money-graphic_675567-2452.jpg?w=826"
          alt="Avatar"
          class="w-full h-80"
        />
      </div>
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
  </SystemLayout>
</template>
<script setup lang="ts">
import { ref, onMounted } from 'vue'
import Chart from 'chart.js/auto'

const props = defineProps({
  msg: String
})
let myChart: any
onMounted(() => {
  renderChart()
})
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
</script>
<style scoped>
/* Add scoped styles if necessary */
</style>
