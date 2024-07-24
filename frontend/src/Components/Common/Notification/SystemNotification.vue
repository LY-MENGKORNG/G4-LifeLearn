<template>
    <el-drawer :visible="modelValue" @update:visible="updateValue" title="I am the title" :with-header="false">
        <span class="text-lg font-semibold">Your notifications</span>
    </el-drawer>
</template>

<script setup lang="ts">

const props = defineProps({
  modelValue: Boolean
})

const emits = defineEmits(['update:modelValue'])

const updateValue = (newValue: boolean) => {
  emits('update:modelValue', newValue)
}
</script>

<style scoped></style>