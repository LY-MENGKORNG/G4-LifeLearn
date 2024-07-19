<template>
    <SystemLayout>
        <div class="flex justify-between rounded-lg shadow-md h-screen px-40 space-y-10">
            <div class="flex items-cente w-full px-3">
                <div class="w-full">
                    <div class="flex flex-col border-b-2 border-blue-500 justify-between">
                        <div class="flex flex-col">
                            <p class="text-lg font-bold">{{ quiz.topics }}</p>
                            <p>{{ quiz.title }}</p>
                            <p>Created </p>
                        </div>
                        <div class="flex justify-between">
                            <p>{{ quiz.points }} points</p>
                            <p>{{ quiz.deadline }}</p>
                        </div>
                    </div>
                    <a :href="'http://localhost:8000/documents/' + quiz.fields" target="_blank">
                        <img class="w-20 h-26 pt-3"
                            src="" />
                    </a>
                    <div class="w-40 pt-3 space-y-3 pb-3">
                        <a :href="quiz.links" class="w-40 text-blue-600">links_here_just_clicked_or_copy</a>
                        <p>{{ quiz.instructions }}</p>
                    </div>
                    <div class="py-3 border-t-2 border-blue-500">
                        <p class="flex">
                            <el-icon :size="20" class="mr-4">
                                <User />
                            </el-icon>
                            Class comments
                        </p>
                        <button class="text-blue-500 px-2 py-1 rounded">Add a class comment</button>
                    </div>
                </div>
            </div>
            <div class="cols space-y-3">
                <div class="flex flex-col shadow bg-white p-4 w-70 space-y-3 rounded">
                    <div class="flex flex-row justify-between">
                        <div class="rounded">+ Add or create</div>
                        <p>Your work</p>
                    </div>
                    <form @submit.prevent="SubmitQuiz">
                        <button class="border-1 border-gray-500 p-4 rounded items-centerw-max">
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file_input" type="file" @change="handleFileUpload($event)" />
                        </button>
                        <input type="number" v-model="quiz.id" required>
                        <input type="number" v-model="quiz.classroom_id" required>
                        <button type="submit"
                            class="border-1 border-gray-500 p-2 mt-2 rounded items-center w-full text-blue-700">
                            Submit
                        </button>
                    </form>
                </div>
                <div class="bg-white w-max space-y-3 rounded shadow absolute">
                    <div class="p-4 space-y-3">
                        <div class="flex space-x-4">
                            <el-icon :size="20">
                                <User />
                            </el-icon>
                            <p class="text-xl">Private comments</p>
                        </div>
                        <button class="px-2 py-1 rounded text-xl text-blue-500" @click="showForm()">
                            Add comment to Rady Y
                        </button>
                        <FormComment v-if="formVisible" />
                    </div>
                </div>
            </div>
        </div>
    </SystemLayout>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';
import FormComment from '@/Components/Classroom/FomComment.vue';
import SystemLayout from '@/Layouts/System/SystemLayout.vue';
import { User } from '@element-plus/icons-vue';
import router from '@/router';
import { useQuizStore } from '@/stores/quiz-store';
import { useSubmitStore } from '@/stores/submit-store';

const quizStore = useQuizStore()
const submitStore = useSubmitStore()

const quiz = ref({
    classroom_id: '',
    title: '',
    instructions: '',
    points: null,
    deadline: '',
    topics: '',
    links: '',
    fields: '',
    created_at: '',
})

const submitted = ref({
    classroom_id: 1,
    assignment_id: 1,
    work: '',
})

const id = router.router.currentRoute.value.params.id
const formVisible = ref(false)

const handleFileUpload = (event: Event) => {
    const target = event.target as HTMLInputElement;
    if (target.files) {
        quizcreate.value.fields = target.files[0];
    }
};

function showForm() {
    formVisible.value = !formVisible.value
}

onMounted(async () => {
    await quizStore.fetchQuizzesOne(id)
    quiz.value = quizStore.quiz.data
})

onMounted(async () => {
    await submitStore.fetchSubmit();
});

const SubmitQuiz = async () => {
    try {
        console.log('Creating quiz with data:', submitted.value);
        await submitStore.SubmitQuizz(submitted.value);
        console.log(1);

    } catch (error) {
        console.warn("Error creating quiz:", error);
        console.log(3);
    }
};
</script>
