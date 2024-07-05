<template>
    <div class="mt-10">
        <div class="calendar-header flex justify-between items-center mb-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="goToPreviousMonth">Previous Month</button>
            <div class="calendar-title text-xl font-bold">{{ formattedDate(currentDate) }}</div>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" @click="goToNextMonth">Next Month</button>
        </div>

        <div class="overflow-x-auto">
            <table class="calendar-table w-full table-fixed border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th v-for="day in days" :key="day" class="py-4 text-center border-b">{{ day }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="week in calendar" :key="week[0].date">
                        <td v-for="date in week" :key="date.date" :class="{ 'font-bold': date.isSelected }" class="text-center py-8 border relative" @click="handleDateClick(date)">
                            <div class="date-cell flex flex-col items-center">
                                <div class="date text-lg">{{ date.day }}</div>
                                <div v-if="date.isSelected" class="selected-mark mt-1">✔️</div>
                                <div v-if="date.info" class="info-card mt-1 p-2 bg-blue-100 border border-blue-300 rounded shadow-lg">
                                    <div class="info-content p-2 bg-white border border-gray-200 rounded shadow">
                                        {{ date.info }}
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Modal for input form -->
        <div v-if="showForm" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded shadow-md">
                <h2 class="text-xl font-bold mb-4">Add Schedule for {{ selectedDate.date.getDate() }}</h2>
                <form @submit.prevent="saveInfo">
                    <div class="mb-4">
                        <label for="info" class="block text-sm font-medium text-gray-700">Information</label>
                        <input type="text" id="info" v-model="inputInfo" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>
                    <div class="flex justify-center">
                        <button type="button" @click="closeForm" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Cancel</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'CalendarCom',
    data() {
        return {
            currentDate: new Date(),
            days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            showForm: false,
            selectedDate: null,
            inputInfo: '',
            datesInfo: {} // Object to store information for each date
        };
    },
    computed: {
        calendar() {
            const startDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), 1);
            const endDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, 0);
            const startDay = startDate.getDay();
            const endDay = endDate.getDate();

            let dates = [];
            for (let i = 0; i < startDay; i++) {
                dates.push({
                    date: new Date(startDate.getFullYear(), startDate.getMonth(), i - startDay + 1),
                    day: '',
                    isSelected: false,
                    info: ''
                });
            }
            for (let i = 1; i <= endDay; i++) {
                const dateKey = this.formatDay(startDate.getFullYear(), startDate.getMonth() + 1, i);
                dates.push({
                    date: new Date(startDate.getFullYear(), startDate.getMonth(), i),
                    day: i,
                    isSelected: this.isToday(startDate.getFullYear(), startDate.getMonth() + 1, i),
                    info: this.datesInfo[dateKey] || ''
                });
            }
            while (dates.length % 7 !== 0) {
                dates.push({
                    date: new Date(endDate.getFullYear(), endDate.getMonth(), endDay + 1),
                    day: '',
                    isSelected: false,
                    info: ''
                });
            }

            const weeks = [];
            for (let i = 0; i < dates.length; i += 7) {
                weeks.push(dates.slice(i, i + 7));
            }

            return weeks;
        }
    },
    methods: {
        goToPreviousMonth() {
            this.currentDate.setMonth(this.currentDate.getMonth() - 1);
            this.currentDate = new Date(this.currentDate);
        },
        goToNextMonth() {
            this.currentDate.setMonth(this.currentDate.getMonth() + 1);
            this.currentDate = new Date(this.currentDate);
        },
        formattedDate(date) {
            const options = { year: 'numeric', month: 'long' };
            return date.toLocaleDateString(undefined, options);
        },
        formatDay(year, month, day) {
            return `${year}-${month.toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
        },
        isToday(year, month, day) {
            const today = new Date();
            return year === today.getFullYear() && month === today.getMonth() + 1 && day === today.getDate();
        },
        handleDateClick(date) {
            if (date.day) {
                this.selectedDate = date;
                this.inputInfo = date.info || '';
                this.showForm = true;
            }
        },
        closeForm() {
            this.showForm = false;
            this.selectedDate = null;
            this.inputInfo = '';
        },
        saveInfo() {
            if (this.selectedDate) {
                const dateKey = this.formatDay(this.selectedDate.date.getFullYear(), this.selectedDate.date.getMonth() + 1, this.selectedDate.date.getDate());
                this.datesInfo = { ...this.datesInfo, [dateKey]: this.inputInfo };
                this.closeForm();
            }
        }
    }
}
</script>
<style scoped>
.date-cell {
    position: relative;
}
.info-card {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 90%;
    z-index: 10;
    background-color: #ebf8ff;
    border: 1px solid #90cdf4;
    border-radius: 0.25rem;
    padding: 0.5rem;
}
.info-content {
    background-color: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 0.25rem;
    padding: 0.5rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
</style>
