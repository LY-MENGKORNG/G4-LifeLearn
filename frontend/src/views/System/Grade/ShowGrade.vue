        
<script setup lang="ts">
import ClassList from "@/Components/Common/List/ClassList.vue"
</script>
        
<template>
    <SystemLayout>
            <div class="flex justify-between items-center">
                <h2 class="text-xl">Class List</h2>
                <button
                    class="flex gap-2 items-center py-2 px-4 rounded-md bg-green-400 hover:bg-green-400/80 active:bg-green-400/60 transition-all">
                    <Plus class="w-5" />
                    <span>Create</span>
                </button>
            </div>
            <div class="mt-3">
                <ClassList name="hi" />
            </div>
    </SystemLayout>
</template>