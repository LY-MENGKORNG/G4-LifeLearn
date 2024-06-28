<template>
    <el-container class="flex p-0">
        <el-button class="rounded-circle flex-1 h-10 w-10 flex overflow-hidden">
            <img class="rounded-full w-15  ring-2 ring-white"
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
