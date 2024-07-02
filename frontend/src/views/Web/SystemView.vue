<template>
  <WebLayout>
    <Header>
      <div class="container">
        <div class="flex gap-10 p-10">
          <div class="flex-none relative">
            <img
              class="h-auto max-w-lg transition-all duration-300 rounded-lg cursor-pointer filter"
              src="https://static.vecteezy.com/vite/assets/find-your-path-main-b1f6179c.webp"
              alt="image description"
            />
          </div>
          <div>
            <div>
              <p class="text-3xl text-teal-400 font-bold text-align-center">LifeLearn System</p>
              <h5
                class="py-2 text-4xl text-align-center font-bold tracking-tight text-gray-900 dark:text-white"
              >
                Empower Your
                <span class="text-teal-400 font-bold">School</span> With Seamless Management!
              </h5>
              <p class="text-align-center">
                Transform your school's administration with our comprehensive management system,
                streamlining every aspect of school operations for unparalleled efficiency and
                success!
              </p>
            </div>
            <div class="flex justify-center">
              <router-link to="/system/payment">
                <el-button
                  class="bg-gray-900 text-white font-bold py-4 px-10 hover:bg-gray-900 focus:bg-gray-900"
                >
                  Buy Now
                </el-button>
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </Header>

    <div class="title">
      <h3 class="mt-5 text-center text-black-400 font-bold text-2xl">Key elements in​ System</h3>
      <p class="text-center text-gray-400 p-3">
        Understand our school system to better clear how to provide convenience that facilitates
        your school planning.
      </p>
    </div>

    <div class="card-details flex flex-wrap gap-4">
  <div
    class="block min-w-[18rem] rounded-lg border mt-5 bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white"
  >
    <div class="relative overflow-hidden bg-cover bg-no-repeat">
      <img
        class="rounded-t-lg"
        src="https://t3.ftcdn.net/jpg/04/15/75/64/360_F_415756435_Vm6GKSJEQcQy1hIZGO04yRa0aVtSNhxi.jpg  "
        alt=""
      />
    </div>
    <div class="p-6">
      <h5 class="mb-2 text-xl text-start font-medium leading-tight">
        <b>Role</b>
      </h5>
      <p class="text-base text-start">
        Take on responsibilities and tasks within an organization or project to achieve specific objectives.
      </p>
      <p class="text-start py-3">Great if you like</p>
      <div class="flex flex-wrap gap-2">
        <button class="bg-teal-400 rounded-lg px-3 text-xs leading-tight">Responsibility</button>
        <button class="bg-teal-400 rounded-lg px-3 py-1 text-xs leading-tight">Collaboration</button>
        <button class="bg-teal-400 rounded-lg px-3 py-1 text-xs leading-tight">Goal Achievement</button>
      </div>
    </div>
  </div>
  <div
    class="block min-w-[18rem]  rounded-lg border mt-5 bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white"
  >
    <div class="relative overflow-hidden bg-cover bg-no-repeat">
      <img
        class="rounded-t-lg"
        src="https://watermark.lovepik.com/photo/20211209/large/lovepik-image-of-a-confident-english-teacher-picture_501712498.jpg"
        alt=""
      />
    </div>
    <div class="p-6">
      <h5 class="mb-2 text-xl text-start font-medium leading-tight">
        <b>User</b>
      </h5>
      <p class="text-base text-start">
        Engage with software and technology to achieve personal or professional objectives efficiently.
      </p>
      <p class="text-start py-3">Great if you like</p>
      <div class="flex flex-wrap gap-2">
        <button class="bg-teal-400 rounded-lg px-3 text-xs leading-tight">Technology</button>
        <button class="bg-teal-400 rounded-lg px-3 py-1 text-xs leading-tight">Efficiency</button>
        <button class="bg-teal-400 rounded-lg px-3 py-1 text-xs leading-tight">User Experience</button>
      </div>
    </div>
  </div>
  <div
    class="block min-w-[18rem]  rounded-lg border mt-5 bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white"
  >
    <div class="relative overflow-hidden bg-cover bg-no-repeat">
      <img
        class="rounded-t-lg"
        src="https://miro.medium.com/v2/resize:fit:1100/format:webp/1*ZtVBaGkeqzTTz3uvMo8Tyg.jpeg"
        alt=""
      />
    </div>
    <div class="p-6">
      <h5 class="mb-2 text-xl text-start font-medium leading-tight">
        <b>Permission</b>
      </h5>
      <p class="text-base text-start">
        Control and manage access to resources and information.
      </p>
      <p class="text-start py-3">Great if you like</p>
      <div class="flex flex-wrap gap-2">
        <button class="bg-teal-400 rounded-lg px-3 text-xs leading-tight">Security</button>
        <button class="bg-teal-400 rounded-lg px-3 py-1 text-xs leading-tight">Administration</button>
        <button class="bg-teal-400 rounded-lg px-3 py-1 text-xs leading-tight">Compliance</button>
      </div>
    </div>
  </div>
  <div
    class="block min-w-[18rem]  rounded-lg border mt-5 bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white"
  >
    <div class="relative overflow-hidden bg-cover bg-no-repeat">
      <img
        class="rounded-t-lg"
        src="https://www.thoughtco.com/thmb/v5w7Ja1uz6WchWgbKjR_2P_wsek=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/JapaneseHighSchool-58c6b01b3df78c353c640258.jpg"
        alt=""
      />
    </div>
    <div class="p-6">
      <h5 class="mb-2 text-xl text-start font-medium leading-tight">
        <b>System</b>
      </h5>
      <p class="text-base text-start">
        Educational institutions designed to facilitate learning and development for students.
      </p>
      <p class="text-start py-3">Great if you like</p>
      <div class="flex flex-wrap gap-2">
        <button class="bg-teal-400 rounded-lg px-3 py-1 text-xs leading-tight">Education</button>
        <button class="bg-teal-400 rounded-lg px-3 py-1 text-xs leading-tight">Development</button>
        <button class="bg-teal-400 rounded-lg px-3 py-1 text-xs leading-tight">Community</button>
      </div>
    </div>
  </div>
  <div
    class="block min-w-[18rem] rounded-lg border mt-5 bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white"
  >
    <div class="relative overflow-hidden bg-cover bg-no-repeat">
      <img
        class="rounded-t-lg"
        src="https://i.pinimg.com/564x/cc/d0/d4/ccd0d47149edc02c5783543566425b77.jpg"
        alt=""
      />
    </div>
    <div class="p-6">
      <h5 class="mb-2 text-xl text-start font-medium leading-tight">
        <b>Notifacation</b>
      </h5>
      <p class="text-base text-start">
        Alerts or messages that inform users about important updates, events, or actions.
      </p>
      <p class="text-start py-3">Great if you like</p>
      <div class="flex flex-wrap gap-2">
        <button class="bg-teal-400 rounded-lg px-3 text-xs leading-tight">Communication</button>
        <button class="bg-teal-400 rounded-lg px-3 py-1 text-xs leading-tight">Timeliness</button>
        <button class="bg-teal-400 rounded-lg px-3 py-1 text-xs leading-tight">Customization</button>
      </div>
    </div>
  </div>
  <div
    class="block min-w-[18rem] rounded-lg border mt-5 bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white"
  >
    <div class="relative overflow-hidden bg-cover bg-no-repeat">
      <img
        class="rounded-t-lg"
        src="https://i.pinimg.com/564x/e1/4b/eb/e14bebc86b1041eaccb0d35dff8c7e5e.jpg"
        alt=""
      />
    </div>
    <div class="p-6">
      <h5 class="mb-2 text-xl text-start font-medium leading-tight">
        <b>Setting</b>
      </h5>
      <p class="text-base text-start">
        The environment or context in which events, actions, or stories take place.
      </p>
      <p class="text-start py-3">Great if you like</p>
      <div class="flex flex-wrap gap-2">
        <button class="bg-teal-400 rounded-lg px-3 text-xs leading-tight">Atmosphere</button>
        <button class="bg-teal-400 rounded-lg px-3 py-1 text-xs leading-tight">Context</button>
        <button class="bg-teal-400 rounded-lg px-3 py-1 text-xs leading-tight">Immersion</button>
      </div>
    </div>
  </div>
</div>
  </WebLayout>
</template>

<style scoped>
.card-details {
  display: flex;
  flex-wrap: wrap;
  gap: 4rem; /* Adjust the gap between cards */
}

/* Adjust individual card styles as needed */
.block {
  flex: 1 0 18rem; /* This sets the minimum width of each card */
  max-width: calc(25% - 1rem); /* This sets the maximum width to fit 4 cards in a row with a gap */
}
</style>

<script setup lang="ts">
import { ref } from 'vue'
import WebLayout from '@/Layouts/Web/WebLayout.vue'
</script>
