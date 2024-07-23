<script setup lang="ts">
import WebLayout from '@/Layouts/Web/WebLayout.vue'
import { ref } from 'vue'

const contentwelcomes = ref([
    {
        id: 1,
        images: 'https://www.nea.org/sites/default/files/styles/640wide/public/2021-06/2021-Summer-Learning-1920.jpg?itok=EX5oeJgV',
        title: 'Meet the next generation of LifeLearn!',
        description: 'Through innovative technologies and interactive methodologies, LifeLearn empowers individuals to cultivate authentic lifestyles by seamlessly integrating education into their daily lives. By fostering continuous learning and skill development, LifeLearn drives innovation across the globe, transforming traditional educational paradigms and paving the way for a dynamic and accessible future of learning.',
        button: 'Read our story'
    }
]);
const promos = ref([
    {
        id: 1,
        image: 'https://www.nea.org/sites/default/files/styles/640wide/public/2024-05/2024-brockton-library.jpg?itok=u3_8Fd68',
        alt: 'Library',
        title: 'No New Library Books for 30 Years? These Paraeducators Changed That!',
        description: 'A large Massachusetts district lacked new and diverse books so library paraeducators banded together to get an NEA Read Across America grant for new books.'
    },
    {
        id: 2,
        image: 'https://www.nea.org/sites/default/files/styles/640wide/public/2023-06/2023-juneteenth-book-cover-collage.jpg?itok=L4zVLbNl',
        alt: 'Juneteenth Books',
        title: 'Books to Celebrate Juneteenth',
        description: 'Help students learn about and appreciate the significance of Juneteenth with these recommended titles.'
    },
    {
        id: 3,
        image: 'https://www.nea.org/sites/default/files/styles/640wide/public/2024-07/july-grid-96384-childrens-july-nea-1120x630.jpg?itok=K_s_l8IO',
        alt: 'Juneteenth Book',
        title: 'Join Simon & Schuster’s Virtual Fall 2024 Preview!',
        description: 'Hear from Simon & Schuster editors and marketing staff about new picture books, middle grade & teen novels. Guest speaker Jason Reynolds will talk about his new YA novel, <i>Twenty-four Seconds from Now…</i>'
    },
    {
        id: 4,
        image: 'https://www.nea.org/sites/default/files/styles/640wide/public/2023-06/2022-pride-cover.jpg?itok=1YHn_8KT',
        alt: 'Pride Books',
        title: 'LGBTQ+ Books for Schools',
        description: 'Recommended titles that reflect on the LGBTQ+ experience and books about Pride, tolerance, and diversity.'
    },
    {
        id: 5,
        image: 'https://www.nea.org/sites/default/files/styles/640wide/public/2022-12/bookschangeworld.jpg?itok=6ExYc2f3',
        alt: 'Books Change World',
        title: 'What Do Students Want to Read? It Might Not Be What You Think',
        description: 'Move over Dog Man! Make room for nonfiction books.'
    },
    {
        id: 6,
        image: 'https://www.booktrust.org.uk/globalassets/images/programmes-and-projects/bookbuzz/2019/bookbuzz-students-2019-5.jpg?w=1200&h=675&quality=70&anchor=middlecenter',
        alt: 'Summer Reading',
        title: 'Get Serious About Summer Reading',
        description: 'Use these ideas and resources to put good books into kids’ hands and connect them to vibrant summer learning adventures.'
    }
])
</script>
<template>
    <WebLayout>
        <div class="bg-video w-full h-96">
            <video playsinline loop muted autoplay class="w-full h-full object-cover">
                <source
                    src="https://player.vimeo.com/progressive_redirect/download/912634422/rendition/1080p/freedom_to_read_ambient_v2%20%281080p%29.mp4?loc=external&amp;signature=bbff012451c7b4abf2ceaae57cba50451ffed20a97fec697bd749c0e331968ce"
                    type="video/mp4" />
            </video>
        </div>
        <div class="text-center mt-5">
            <h1 class="text-6xl font-bold text-teal mb-4">Welcome to LifeLearn</h1>
            <p class="text-black">Your journey to excellence starts here.</p>
            <p class="py-3 text-black">Join Us Today and Get Started</p>
        </div>
        <div class="container mt-14">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 m-10 flex flex-row" v-for="content in contentwelcomes"
                :key="content.id">

                <div class="flex flex-row-reverse" v-if="content.id === 2">
                    <div class="grid grid-cols md:grid-cols-2 gap-6 mt-36">
                        <div class="p-5 w-full h-full">
                            <h2 class="text-4xl font-bold text-gray-900 mb-4">{{ content.title }}</h2>
                            <p class="text-gray-700 mb-4">
                                {{ content.description }}
                            </p>
                            <div class="grid grid-cols-3 gap-2 mt-3" v-if="content.id === 2">
                                <a class="inline-block" v-if="content.app">
                                    <img :src="content.app" alt="Apple App"
                                        class="hover:opacity-75 transition duration-200" />
                                </a>
                                <a class="inline-block" v-if="content.google">
                                    <img :src="content.google" alt="Google Play App"
                                        class="hover:opacity-75 transition duration-200" />
                                </a>
                                <a class="inline-block" v-if="content.huawei">
                                    <img :src="content.huawei" alt="Huawei AppGallery"
                                        class="hover:opacity-75 transition duration-200" />
                                </a>
                            </div>
                        </div>
                        <el-image :src="content.images" alt="Summer Learning" class="object-cover  rounded-md"
                            fit="cover" style="width: 100%; height: 100%"></el-image>
                    </div>
                </div>
                <div class=" grid-cols-1 md:grid-cols-2 gap-6 m-10 flex flex-row " v-if="content.id !== 2">
                    <el-image :src="content.images" alt="Content Image" class="object-cover w-full h-auto rounded-md"
                        fit="cover" style="width: 90%; height: 90%">
                    </el-image>

                    <el-card class="p-5 w-full">
                        <h2 class="text-4xl font-bold text-gray-900 mb-4">{{ content.title }}</h2>
                        <p>{{ content.description }}</p>
                        <div class="pt-3" v-if="content.button">
                            <el-button type="primary">{{ content.button }}</el-button>
                        </div>
                    </el-card>
                </div>
            </div>
        </div>

        <div class="text-center mt-24">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Do you know books in system?</h2>
            <p>The industry is changing fast! Stay up to date with LifeLearn press. Catch up on the latest news,
                updates, and reports here.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-16">
            <!-- Grid Promo Items -->
            <div v-for="promo in promos" :key="promo.id"
                class="grid-promo ml-10 hover:bg-gray-100 shadow-md rounded-lg cursor-pointer">
                <div class="relative">
                    <img :src="promo.image" :alt="promo.alt" class="object-cover w-full h-auto rounded-md" />
                </div>
                <h3 class="text-primary-title text-xl md:text-2xl font-bold mt-4 mb-2 ml-4 mr-4">{{ promo.title }}</h3>
                <p class="text-sans-serif text-base mb-6 ml-4 mr-4">{{ promo.description }}</p>
            </div>
        </div>
    </WebLayout>
</template>
<style scoped>
.grid-promo {
    position: relative;
}

.text-primary-title {
    color: #333;
}
</style>
