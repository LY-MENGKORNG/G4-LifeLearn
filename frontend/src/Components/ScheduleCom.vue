<template>
  <div class=" ">
    <div class="flex justify-end">
      <button class="bg-green-500 hover:bg-green-700 my-3 text-white font-bold mr-5 py-2 px-4 rounded" @click="goToPermissions">
        📝 Permissions
      </button>
    </div>
    <div class="scrollable-content " >

      <div class="calendar-header flex justify-between items-center mb-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="goToPreviousMonth">
          👈 Previous Month
        </button>
        <div class="calendar-title text-xl font-bold">{{ formattedDate(currentDate) }}</div>

          <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" @click="goToNextMonth">
            👉 Next Month
          </button>

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
              <td v-for="date in week" :key="date.date" :class="{ 'font-bold': date.isSelected }"
                class="text-center py-8 border relative" @click="handleDateClick(date)">
                <div class="date-cell flex flex-col items-center">
                  <div class="date text-lg">{{ date.day }}</div>
                  <div v-if="date.isSelected" class="selected-mark mt-1">✔️</div>
                  <div v-if="date.info.name"
                    class="info-card mt-1 p-2 bg-blue-100 border border-blue-300 rounded shadow-lg">
                    <div class="info-content p-2 bg-white border border-gray-200 rounded shadow">
                      {{ date.info.name }}
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
        <div class="bg-white p-6 rounded shadow-md custom-modal">
          <h2 class="text-xl font-bold mb-4">Add Schedule for {{ selectedDate.date.getDate() }}</h2>
          <form @submit.prevent="closeForm">
            <div class="mb-4">
              <label for="name" class="block text-sm font-medium text-gray-700">Event Name</label>
              <input type="text" id="name" v-model="inputInfo.name"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" />
            </div>
            <div class="mb-4">
              <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
              <input type="text" id="description" v-model="inputInfo.description"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" />
            </div>
            <div class="mb-4">
              <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
              <input type="text" id="type" v-model="inputInfo.type"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" />
            </div>
            <div class="mb-4 flex space-x-4">
              <div class="w-1/2">
                <label for="startDate" class="block text-sm font-medium text-gray-700">Start Date</label>
                <input type="date" id="startDate" v-model="inputInfo.start_date"
                  class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" />
              </div>
              <div class="w-1/2">
                <label for="endDate" class="block text-sm font-medium text-gray-700">End Date</label>
                <input type="date" id="endDate" v-model="inputInfo.end_date"
                  class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" />
              </div>
            </div>
            <div class="mb-4">
              <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
              <input type="text" id="location" v-model="inputInfo.location"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" />
            </div>
            <div class="mb-4">
              <label for="organizer_id" class="block text-sm font-medium text-gray-700">Organizer ID</label>
              <input type="number" id="organizer_id" v-model="inputInfo.organizer_id"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" />
            </div>
            <div class="flex justify-center">
              <button type="button" @click="closeForm"
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                Cancel
              </button>
              <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Save
              </button>
            </div>
          </form>
        </div>
      </div>
 
  
   <!-- Permissions modal -->
  <div v-if="formVisible" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="container mx-auto py-8">
      <div class="w-150 mx-auto bg-white rounded shadow">
        <div class="mx-16 py-4 px-8 text-black text-xl font-bold border-b border-grey-500 flex justify-center">
          Permission Students
        </div>
        <form @submit.prevent="savePermission">
          <div class="py-4 px-8">
            <div class="mb-4">
              <label class="block text-grey-darker text-sm font-bold mb-2">Purpose:</label>
              <input v-model="form.purpose" class="border rounded w-full py-2 px-3 text-grey-darker" type="text" name="purpose" placeholder="Enter Your Purpose" />
              <p id="error_purpose"></p>
            </div>
            <div class="mb-4">
              <label class="block text-grey-darker text-sm font-bold mb-2">Start Date:</label>
              <input v-model="form.start_date" class="border rounded w-full py-2 px-3 text-grey-darker" type="date" name="start_date" />
            </div>
            <div class="mb-4">
              <label class="block text-grey-darker text-sm font-bold mb-2">End Date:</label>
              <input v-model="form.end_date" class="border rounded w-full py-2 px-3 text-grey-darker" type="date" name="end_date" />
            </div>
            <div class="flex justify-between">
              <button type="button" @click="closePermission" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                Cancel
              </button>
              <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Save
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
    </div>
  </div>
</template>

<script>
import axiosInstance from '@/plugins/axios';// Import the axiosInstance


export default {
  name: 'CalendarCom',
  data() {
    return {
      currentDate: new Date(),
      days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      showForm: false,
      formVisible: false,
      selectedDate: null,
      inputInfo: {
        name: '',
        description: '',
        type: '',
        start_date: '',
        end_date: '',
        location: '',
        organizer_id: ''
      },
      datesInfo: {},
      form: {
        purpose: '',
        start_date: '',
        end_date: '',
      },
    };
  },
  computed: {
    calendar() {
      const startDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), 1);
      const endDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, 0);
      const startDay = startDate.getDay();
      const endDay = endDate.getDate();
      let dates = [];

      // Fill the first week with empty days if the month doesn't start on Sunday
      for (let i = 0; i < startDay; i++) {
        dates.push({
          date: new Date(startDate.getFullYear(), startDate.getMonth(), i - startDay + 1),
          day: '',
          isSelected: false,
          info: ''
        });
      }

      // Fill the calendar with actual days of the month
      for (let i = 1; i <= endDay; i++) {
        const dateKey = this.formatDay(startDate.getFullYear(), startDate.getMonth() + 1, i);
        dates.push({
          date: new Date(startDate.getFullYear(), startDate.getMonth(), i),
          day: i,
          isSelected: this.isToday(startDate.getFullYear(), startDate.getMonth() + 1, i),
          info: this.datesInfo[dateKey] || {}
        });
      }

      // Fill the last week with empty days if the month doesn't end on Saturday
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
    goToPermissions() {
      this.formVisible = true;
    },
    closePremission(){
      this.formVisible = false;
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
        this.inputInfo = date.info;
        this.showForm = true;
      }
    },
    closeForm() {
      this.showForm = false;
      this.selectedDate = null;
      this.inputInfo = {};
    },
    saveInfo() {
      if (this.selectedDate) {
        const dateKey = this.formatDay(
          this.selectedDate.date.getFullYear(),
          this.selectedDate.date.getMonth() + 1,
          this.selectedDate.date.getDate()
        );
        this.datesInfo = { ...this.datesInfo, [dateKey]: this.inputInfo };
        axios.post('/events', this.inputInfo)
          .then(response => {
            this.datesInfo[dateKey] = response.data;
            this.closeForm();
          })
          .catch(error => {
            console.error('There was an error saving the event:', error);
          });
      }
    },
  
    async savePermission() {
      try {
        const token = localStorage.getItem('access_token');
        if (!token) {
          throw new Error('No token found');
        }
        const response = await axiosInstance.post('/permission', this.form, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        });
        console.log('Permission saved:', response.data);
        this.closePermission(); // Hide the form upon successful save
      } catch (error) {
        console.error('Error saving permission:', error);
      }

    },

    closePermission() {
      this.formVisible = false;
    },

    showPermissionForm() {
      this.formVisible = true;
    },

    mounted() {
    this.savePermission(); // Calls savePermission when component is mounted
  },
  },
  
    
  
};
</script>

<style scoped>
.custom-modal {
  width: 600px;
  /* Adjust the width as per your preference */
}

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

.scrollable-content {
  height: calc(100vh - 105px);
  overflow-y: auto;
}
</style>
