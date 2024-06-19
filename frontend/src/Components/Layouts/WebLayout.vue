<script setup lang="ts">
import WebHeaderMenu from '@/WebHeaderMenu.vue'
</script>

<template>
  <div class="">
    <web-header-menu />
    <div class="md:px-50 h-full">
      <div class="h-full">
        <slot />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">

</script>
