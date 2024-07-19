<template>
  <SystemLayout>
    <div class="flex flex-row h-100%">
      <div class="w-100% grid gap-3 px-20 py-8">
        <div class="bg-red-900 pl-8 text-white flex justify-between rounded-xl">
          <h1 class="self-end text-4xl pb-8">HomeWork</h1>
          <img class="top-16 left-80 w-80 h-60 object-cover shadow-md rounded-xl"
            src="https://img.freepik.com/free-vector/hand-drawn-flat-design-stack-books-illustration_23-2149341898.jpg"
            alt="Course Image" />
        </div>
        <div class="homework flex flex-row space-x-5 rounded-xl">
          <div class="view bg-white space-y-5 h-fit w-81 p-4 rounded-xl">
            <h4 class="font-bold">Upcoming</h4>
            <p>Woohoo, no work due soon!</p>
            <h5 @click="toggleVisibility" class="flex justify-end font-bold text-blue-500 cursor-pointer">
              View all
            </h5>
            <router-link to="/system/material">
              <h6 v-if="isVisible">Stream</h6>
            </router-link>
            <router-link to="/system/people">
              <h6 v-if="isVisible" class="mt-4">People</h6>
            </router-link>
            <router-link to="/system/missing">
              <h6 v-if="isVisible" class="mt-4">Missing</h6>
            </router-link>
            <router-link to="/system/done">
              <h6 v-if="isVisible" class="mt-4">Done</h6>
            </router-link>
          </div>
          <div class="scrollable-content border-2 rounded-xl w-full px-3 space-y-3 h-10">
            <router-link to="/system/create/quiz" class="flex justify-end items-end">
                    <el-button class="btn btn-primary ">➕ Add Quiz</el-button>
            </router-link>
            <StudentList class="bg-white py-3 px-6 rounded-xl mb-3 shadow-xl" />
            <div class="flex gap-2 flex-col">
            <router-link :to="{ name: 'system-submitform', params: { id: quiz.id }}" class="space-y-3" v-for="quiz in quizz" :key="quiz.id" :quiz="quiz">
              <HomeworkDetail :quiz="quiz" />
            </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </SystemLayout>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router";
import SystemLayout from "@/Layouts/System/SystemLayout.vue";
import HomeworkDetail from "@/Components/Classroom/HomeworkDetail.vue";
import StudentList from "@/Components/Classroom/StudentList.vue";
import { ref, onMounted } from "vue";
import { useQuizStore } from "@/stores/quiz-store";

const isVisible = ref(false);

function toggleVisibility() {
  isVisible.value = !isVisible.value;
}

const quizStore = useQuizStore();

const quizz = ref([]);

onMounted(async () => {
  try {
    await quizStore.fetchQuizzes();
    quizz.value = quizStore.quizze.Quizze; // Assign fetched quizzes
    console.log(quizz.value);
  } catch (error) {
    console.error("Error fetching quizzes:", error);
  }
});
</script>

<style scoped>
.scrollable-content {
  height: calc(54vh - 56px);
  overflow-y: auto;
}
</style>
