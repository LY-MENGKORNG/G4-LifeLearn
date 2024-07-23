<template>
  <div
    class="bg-white border-2 shadow relative w-72 rounded-lg transition-all duration-30 hover:scale-102"
  >
    <!-- <router-link :to="{ name: 'system-material', query: { id: classroom.id } }"> -->
    <router-link to="/system/material">
      <div class="bg-orange-800 flex items-center space-x-0 rounded-tr-xl rounded-tl-xl">
        <div class="flex p-3 space-x-4">
          <div class="space-y-3 text-white">
            <div>
              <h2 class="text-xl">{{ classroom.class_name }}</h2>
              <p>{{ classroom.description }}</p>
            </div>
            <p>{{ classroom.user?.first_name }} {{ classroom.user?.last_name }}</p>
          </div>
          <img
            class="absolute top-0 left-47 w-20 h-24 object-cover rounded-lg shadow-md"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjPn2W_c4_RgCmro5lvO8P53DMe3g61E-a-wUVXZA5yhI2qXoOjgS_RGFc4LPlXtvnk-0&usqp=CAU"
            alt="Course Image"
          />
        </div>
        <img
          class="absolute top-18 left-48 w-20 h-20 object-cover rounded-full shadow-md"
          :src="classroom.user?.profile || 'default-profile-image-url'"
          alt="User Image"
        />
      </div>

      <div
        class="p-5 border-t-2 border-solid border-white flex justify-between space-x-16"
      ></div>
    </router-link>
    <div
      class="px-3 py-3 border-t-1 border-b-0 border-r-0 border-l-0 border-solid border-gray-300 flex justify-between space-x-10"
    >
      <button
        class="bg-red-500 px-2 rounded text-white"
        @click="deleteClassroom(classroom.id)"
      >
        remove{{ classroom.id }}
      </button>
      <div class="space-x-8">
        <el-icon color="black">
          <DocumentChecked />
        </el-icon>
        <el-icon color="black">
          <Folder />
        </el-icon>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Folder, DocumentChecked } from "@element-plus/icons-vue";
import { useClassroomStore } from "@/stores/classroom-store";
import { RouterLink } from "vue-router";

const props = defineProps<{
  classroom: {
    id: number;
    class_name: string;
    description: string;
    user?: {
      first_name: string;
      last_name: string;
      phone: string;
      email: string;
      profile: string;
    };
  };
}>();

const classroomStore = useClassroomStore();

const deleteClassroom = async (classroomId: number) => {
  const isConfirmed = confirm("Are you sure you want to delete this classroom?");

  if (isConfirmed) {
    try {
      await classroomStore.deleteClassroom(classroomId);
      console.log("Classroom deleted successfully");
    } catch (error) {
      console.warn("Error deleting classroom:", error);
    }
  } else {
    console.log("Classroom deletion cancelled");
  }
};
</script>
