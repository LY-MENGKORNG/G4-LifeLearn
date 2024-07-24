<template>
    <div :class="[bg+' flex-1 rounded-md flex items-center justify-between gap-3 p-2 py-3 h-[100px] shadow-sm ']">
        <div class="bg-white/30 flex justify-center items-center bg-opacity-20 rounded-full h-10 w-10">
            <slot></slot>
        </div>
        <div class=" flex-1 space-y-2 text-slate-900">
            <h2 class="text-2xl font-bold">{{ count }}</h2>
            <h4 class="text-lg text-gray-700">{{ title }}</h4>
        </div>
        <div class="hover:bg-white-200 rounded-circle flex-1 inline-block">
            <div class="ml-auto flex h-9 w-9 hover:bg-white hover:bg-opacity-20 transition-all rounded-full p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-5 h-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
defineProps<{
    count: number | string,
    title: string,
    bg?: string
}>()
</script>

<style scoped></style>