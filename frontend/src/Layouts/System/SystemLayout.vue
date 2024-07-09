<<<<<<< HEAD
=======
<script setup lang="ts">
import WebHeaderMenu from '@/Components/WebHeaderMenu.vue'
</script>

>>>>>>> classroom
<template>
  <div class="common-layout">
    <el-container>
      <SystemSidebar :handle-open="handleOpen" :is-collapse="isCollapse" :handle-close="handleClose" />
      <div class="flex flex-col w-screen sticky left-0 top-0">
        <SystemHeader :action="setCollapse" :image='avatar' />
        <div class="flex">
          <el-main>
            <slot></slot>
          </el-main>
        </div>
      </div>
    </el-container>
  </div>
</template>

<script setup lang="ts">
import SystemSidebar from '@/Components/Common/SideBar/SystemSidebar.vue'
import SystemHeader from '@/Components/Common/Header/SystemHeader.vue'
import { ref } from 'vue'
import avatar from '@/assets/avatar/avatar-profile.jpg'

const isCollapse = ref<boolean>(false)
const setCollapse = () => {
  isCollapse.value = !isCollapse.value
}
const handleOpen = (key: string, keyPath: string[]) => {}
const handleClose = (key: string, keyPath: string[]) => {}
</script>