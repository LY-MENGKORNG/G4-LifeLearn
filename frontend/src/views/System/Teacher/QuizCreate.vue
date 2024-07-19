<template>
    <SystemLayout>
        <div class="space-y-10">
            <div class="flex items-center space-x-5 bg-white p-2 rounded">
                <router-link to="">
                    <el-icon :size="26">
                    <CloseBold />
                </el-icon>
                </router-link>
                
                <button class="rounded-full bg-pink-500 px-2 py-1">
                    <el-icon :size="26">
                        <Document />
                    </el-icon>
                </button>
                <p class="text-xl">Quiz</p>
            </div>
            <form @submit.prevent="CreateQuiz">
                <div class="grid grid-cols-3 gap-6 px-20">
                    <div class="shadow p-10 col-span-2">
                        <div class="cardClass">
                            <div class="mb-4">
                                <input type="text" required placeholder="Title"
                                    class="w-full p-2 border rounded bg-input text-foreground"
                                    v-model="quizcreate.title" />
                            </div>
                            <div class="mb-4">
                                <textarea placeholder="Instructions (optional)"
                                    class="w-full p-2 border rounded h-32 bg-input text-foreground"
                                    v-model="quizcreate.instructions"></textarea>
                            </div>
                        </div>
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="text-muted-foreground mb-4">Attach</p>
                            <div class="flex space-x-14 justify-center">
                                <div class="flex flex-col items-center cursor-pointer" @click="toggleUpload">
                                    <div class="w-12 h-12 flex items-center justify-center rounded-full border">
                                        <el-icon>
                                            <Upload />
                                        </el-icon>
                                    </div>
                                    <p class="text-muted-foreground mt-2">Upload</p>
                                </div>
                                <div class="flex flex-col items-center cursor-pointer" @click="toggleLink">
                                    <div class="w-12 h-12 flex items-center justify-center rounded-full border">
                                        <el-icon>
                                            <Link />
                                        </el-icon>
                                    </div>
                                    <p class="text-muted-foreground mt-2">Link</p>
                                </div>
                            </div>
                            <div v-if="inputVisible" class="mt-4">
                                <input type="file" @change="handleFileUpload($event)" />
                            </div>
                            <div v-if="showLink" class="mt-4">
                                <input type="text" v-model="quizcreate.links" placeholder="Enter link" />
                            </div>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="p-4 space-y-4 shadow">
                            <input type="number" placeholder="Points"
                                class="w-full p-2 border rounded bg-input text-foreground" v-model="quizcreate.points"
                                required />
                            <input type="number" placeholder="Classroom ID"
                                class="w-full p-2 border rounded bg-input text-foreground"
                                v-model="quizcreate.classroom_id" required />
                            <input type="date" placeholder="Due"
                                class="w-full p-2 border rounded bg-input text-foreground" v-model="quizcreate.deadline"
                                required />
                            <input type="text" placeholder="Topic"
                                class="w-full p-2 border rounded bg-input text-foreground" v-model="quizcreate.topics"
                                required />
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="bg-blue-500 p-3 rounded text-white border">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </SystemLayout>
</template>

<script setup lang="ts">
import SystemLayout from "@/Layouts/System/SystemLayout.vue";
import { Link, Upload, CloseBold, Document } from "@element-plus/icons-vue";
import { ref, onMounted } from "vue";
import { useQuizStore } from "@/stores/quiz-store";
import { RouterLink } from "vue-router";
import router from '@/router';
import { ElNotification } from 'element-plus';

const quizStore = useQuizStore();

const showLink = ref(false);
const inputVisible = ref(false);

const toggleUpload = () => {
    inputVisible.value = !inputVisible.value;
};

const toggleLink = () => {
    showLink.value = !showLink.value;
};

const quizcreate = ref<any>({
    classroom_id: null,
    title: '',
    instructions: '',
    points: 0,
    deadline: '',
    topics: '',
    links: '',
    fields: ''
});

const handleFileUpload = (event: Event) => {
    const target = event.target as HTMLInputElement;
    if (target.files) {
        quizcreate.value.fields = target.files[0];
    }
};

onMounted(async () => {
    await quizStore.fetchQuizzes();
});

const CreateQuiz = async () => {
    try {
        console.log('Creating quiz with data:', quizcreate.value);
        await quizStore.QuizCreate(quizcreate.value);
        openSuccess()
        setTimeout(() => {
            router.router.push('/system/homework')
        }, 100)
    } catch (error) {
        console.warn("Error creating quiz:", error);
    }
};

const openSuccess = () => {
  ElNotification({
    title: 'Success',
    message: 'User updated successfully',
    type: 'success',
  })
}
</script>

