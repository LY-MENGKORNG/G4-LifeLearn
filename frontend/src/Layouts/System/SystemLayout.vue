<script setup lang="ts">
import WebHeaderMenu from '@/Components/WebHeaderMenu.vue'
</script>

<template>
  <div class="">
    <WebHeaderMenu />
    <div class="md:px-50 h-full">
      <div class="h-full">
        <slot></slot>
      </div>
    </div>
  </div>
</template>
