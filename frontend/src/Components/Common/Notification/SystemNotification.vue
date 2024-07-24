<template>
  <el-drawer v-model="drawer" title="I am the title" :with-header="false">
    <span>Hi there!</span>
  </el-drawer>
</template>

<script lang="ts" setup>
import { ref, watch, defineEmits, defineProps } from 'vue'

const props = defineProps({
  modelValue: {
    type: Boolean,
    required: true,
  },
})

const emits = defineEmits(['update:modelValue'])

const drawer = ref(props.modelValue)

watch(() => props.modelValue, (newVal) => {
  drawer.value = newVal
})

watch(drawer, (newVal) => {
  emits('update:modelValue', newVal)
})
</script>