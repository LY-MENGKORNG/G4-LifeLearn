<template>
  <SystemLayout>
    <div class="flex items-center justify-center h-full w-full">
      <div class="h-full w-full space-y-8">
        <div
          class="bg-gray-200 h-20 pr-10 py-2 border-b border-gray-300 flex justify-end items-center space-x-1"
        >
          <button class="relative" @click="showForm">
            <el-icon
              class="mr-5 font-black"
              :size="26"
              @mouseover="showTooltip = true"
              @mouseleave="showTooltip = false"
            >
              <Plus />
            </el-icon>
            <div
              v-if="showTooltip"
              class="bg-gray-800 text-white text-sm p-2 rounded w-max mt-2"
            >
              Create or join a class
            </div>
          </button>
          <img
            class="w-10 h-10 object-cover rounded-full shadow-md"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT35Sk9mMEcBuooCRGNUylcYn-PR6IZhDHzvA&s"
            alt="Course Image"
          />
        </div>
        <div
          class="scrollable-content flex flex-wrap px-18 pt-4 space-x-3 space-y-3 items-center"
        >
          <!-- <router-link
            to="{ name: 'system-material', params: { id: classroom.id } }"
            v-for="classroom in classroomList"
            :key="classroom.id"
            :classroom="classroom"
          > -->
          <CardView
            v-for="classroom in classroomList"
            :key="classroom.id"
            :classroom="classroom"
          />
          <!-- </router-link> -->
        </div>
        <FormclassCreate
          class="w-full"
          @create="handleCreate"
          v-if="formVisible"
          @cancel="closeForm"
        />
      </div>
    </div>
  </SystemLayout>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { Plus } from "@element-plus/icons-vue";
import SystemLayout from "@/Layouts/System/SystemLayout.vue";
import CardView from "@/Components/Classroom/CardView.vue";
import FormclassCreate from "@/Components/Classroom/FormclassCreate.vue";
import { useClassroomStore } from "@/stores/classroom-store";

const classroomStore = useClassroomStore();
const classroomList = ref<any>({
  grade_id: 1,
  class_name: "",
  description: "",
  user: {
    first_name: "",
    last_name: "",
    phone: "",
    email: "",
    profile: "",
  },
});

const showTooltip = ref(false);
const formVisible = ref(false);

function showForm() {
  formVisible.value = true;
}
function closeForm() {
  formVisible.value = false;
}
function handleCreate() {
  console.log("Create button clicked");
  formVisible.value = false;
}

onMounted(async () => {
  try {
    await classroomStore.fetchClassrooms();
    classroomList.value = classroomStore.classrooms;
    console.log(classroomList.value);
  } catch (error) {
    console.error(error);
  }
});
</script>

<style scoped>
.scrollable-content {
  height: calc(mx-auto - 56px);
  overflow-y: 100px;
}
</style>
