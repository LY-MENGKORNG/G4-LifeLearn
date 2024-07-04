<template>
    <el-header class="flex items-center justify-between bg-white">
        <el-button @click="action" class="border-none" >
            <Fold size="15px" />
        </el-button>
        <SystemProfile src="" />
    </el-header>
</template>

<script setup lang="ts">
import SystemProfile from '../Profile/SystemProfile.vue'
import {
    Fold
} from '@element-plus/icons-vue'
import { toRefs } from 'vue';

import { defineProps, reactive } from "vue";

const props = defineProps({
    action: Function,
});

const { action } = toRefs(props);

</script>
