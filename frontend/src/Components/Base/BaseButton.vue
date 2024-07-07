<template>
    <el-button>{{ text }}</el-button>
</template>

<script setup lang="ts">
import { defineProps } from "vue"

const props = defineProps({
    text: {
        type: String,
        required: true
    }
})
</script>
