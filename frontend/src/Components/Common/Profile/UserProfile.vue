<template>
    <el-container class="relative flex">
        <el-button class="rounded-circle h-10 w-10 flex overflow-hidden">
            <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white"
                :src="Src"
                alt="">
        </el-button>
    </el-container>
</template>

<script setup lang="ts">
import { defineProps } from 'vue'


defineProps({
    Src: String
})


</script>
