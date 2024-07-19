<template>
	<div class="calendar">
		<div class="header">
			<button @click="prevMonth">Previous</button>
			<div>{{ monthNames[currentMonth] }} {{ currentYear }}</div>
			<button @click="nextMonth">Next</button>
		</div>
		<div class="weekdays">
			<div v-for="(day, index) in weekDays" :key="index" class="weekday">
				{{ day }}
			</div>
		</div>
		<div class="days">
			<div
				v-for="(day, index) in daysInMonth"
				:key="index"
				class="day"
				:class="{ today: isToday(day) }"
			>
				{{ day }}
			</div>
		</div>
	</div>
</template>
  
  <script lang="ts" setup>
import { ref } from 'vue'

const currentDate = ref(new Date())
const currentMonth = ref(currentDate.value.getMonth())
const currentYear = ref(currentDate.value.getFullYear())

const monthNames = [
	'January',
	'February',
	'March',
	'April',
	'May',
	'June',
	'July',
	'August',
	'September',
	'October',
	'November',
	'December'
]

const weekDays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']

const daysInMonth = ref<number[]>([])

const getDaysInMonth = (year: number, month: number) => {
	const date = new Date(year, month, 1)
	const days: number[] = []
	while (date.getMonth() === month) {
		days.push(date.getDate())
		date.setDate(date.getDate() + 1)
	}
	return days
}

const updateDaysInMonth = () => {
	daysInMonth.value = getDaysInMonth(currentYear.value, currentMonth.value)
}

const isToday = (day: number) => {
	const today = new Date()
	return (
		day === today.getDate() &&
		currentMonth.value === today.getMonth() &&
		currentYear.value === today.getFullYear()
	)
}

const prevMonth = () => {
	if (currentMonth.value === 0) {
		currentMonth.value = 11
		currentYear.value -= 1
	} else {
		currentMonth.value -= 1
	}
	updateDaysInMonth()
}

const nextMonth = () => {
	if (currentMonth.value === 11) {
		currentMonth.value = 0
		currentYear.value += 1
	} else {
		currentMonth.value += 1
	}
	updateDaysInMonth()
}

updateDaysInMonth()
</script>
  
  <style scoped>
.calendar {
	width: 300px;
	margin: 0 auto;
	border: 1px solid #ddd;
	border-radius: 4px;
	padding: 16px;
}

.header {
	display: flex;
	justify-content: space-between;
	align-items: center;
	margin-bottom: 16px;
}

.weekdays,
.days {
	display: grid;
	grid-template-columns: repeat(7, 1fr);
	gap: 8px;
}

.weekday {
	text-align: center;
	font-weight: bold;
}

.day {
	text-align: center;
	padding: 8px;
	border-radius: 4px;
}

.today {
	background-color: #007bff;
	color: white;
}
</style>
  