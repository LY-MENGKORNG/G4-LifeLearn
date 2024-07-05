<template>
    <el-avatar :icon="icon" :src="image" />
</template>

<script setup lang="ts">
import { defineProps, toRefs } from "vue";

const props = defineProps({
  image: String,
  icon: String,
});
const { image, icon } = toRefs(props);

</script>
