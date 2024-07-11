<template>
    <div class="">
        <router-link to="/" class="flex flex-wrap gap-2 items-center">
            <img class="object-contain " :src="logo" alt="">
            <h3 class="font-medium text-xl">LifeLearn</h3>
        </router-link>
    </div>
</template>

<script setup lang="ts">
import logo from "@/assets/app-logo.png"
</script>
