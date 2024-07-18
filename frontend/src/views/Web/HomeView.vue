<script setup lang="ts">
import Carousel from '@/Components/Carousel.vue'
import bookHeader from '@/assets/header-book.jpg'
import teachingHeader from '@/assets/header-teaching.jpg'
import educationHeader from '@/assets/header-education.jpg'
import ContentCard from '@/Components/Common/Card/ContentCard.vue'
import CourseCard from '@/Components/Common/Card/CourseCard.vue'

import { Finished, TrendCharts, Clock } from '@element-plus/icons-vue'
import { onMounted, ref } from 'vue'

import { useCourseStore } from '@/stores/course-store'
const courseStore = useCourseStore()
const courseList = ref<any>([])

const carousels = [
	{ id: 1, name: 'Learning', image: educationHeader },
	{ id: 3, name: 'Library', image: bookHeader },
	{ id: 4, name: 'System', image: bookHeader },
	{ id: 5, name: 'Communication', image: bookHeader }
]

const contentList = [
	{
		id: 1,
		icon: Finished,
		top: {
			title: 'Prior experience optional',
			description: 'Build job-ready skills, even if you’re new to the field.'
		},
		bottom: {
			title: '2,284,150',
			description: 'job openings across entry-level Professional Certificate fields¹'
		}
	},
	{
		id: 2,
		icon: TrendCharts,
		top: {
			title: 'Earn a valuable credential',
			description:
				'Apply your new skills to real-world projects using the latest industry tools and techniques'
		},
		bottom: {
			title: '4.7 / 5',
			description:
				'average rating given by 200,000+ global learners enrolled in an entry-level Professional Certificate²'
		}
	},
	{
		id: 3,
		icon: Clock,
		top: {
			title: 'Learn at your own place',
			description: 'Complete the training in less than 6 months while working a full-time job.'
		},
		bottom: {
			title: 'Under 10 hours',
			description: 'of flexible study per week³'
		}
	}
]

onMounted(async () => {
	await courseStore.fetchCourses()
	courseList.value = courseStore.courses
})
</script>

<template>
	<WebLayout>
		<div
			class="flex flex-col md:flex-row items-start bg-card dark:bg-card"
		>
			<div class="w-full md:w-1/2 relative md:order-2">
				<div class="hidden md:block">
					<img
						src="../../assets/2693.jpg"
						alt="Person smiling while working on a laptop"
						class=""
					/>
				</div>
				<div
					class="absolute inset-0 bg-cover bg-center md:hidden"
					style="background-image: url('https://img.freepik.com/free-photo/multiracial-group-young-creative-people-smart-casual-wear-discussing-business-brainstorming-meeting-ideas-mobile-application-software-design-project-modern-office-coworker-teamwork-concept_7861-2693.jpg?t=st=1721097774~exp=1721101374~hmac=9d26b88f2fcbb6293130b1694b419b8e42284769797ad35f2efd8a2918c4bb2e&w=996')"
				></div>
			</div>
			<div class="w-full flex flex-col justify-center md:w-1/2 md:order-1 mt-5 md:mt-0 p-8">
				<h1
					class="text-3xl md:text-4xl font-bold text-card-foreground dark:text-card-foreground mb-4"
				>
					Launch your new career with a Professional Certificate on Coursera
				</h1>
				<p class="text-lg text-muted-foreground dark:text-muted-foreground mb-6">
					Professional Certificates offer flexible, online training designed to get you job-ready
					for high-growth fields.
				</p>
				<div class="block">
					<a href="#course" class="">
						<el-button class="bg-green-400 text-white hover:bg-green-500" size="large">
							Explore Course
						</el-button>
					</a>
				</div>
			</div>
		</div>
		<div class="flex flex-col w-full py-5">
			<h1 class="text-2xl text-center font-medium">Take the first step toward your new career</h1>
			<span class="text-lg text-center text-slate-400"
				>Get professional-level training and earn a credential recognized by leading
				companies.</span
			>
			<div class="xl:grid lg:grid lg:grid-cols-3 sm:grid-cols-2 gap-3 mx-auto my-3">
				<content-card
					v-for="content in contentList"
					:icon="content.icon"
					:top="content.top"
					:bottom="content.bottom"
					:key="content.id"
				/>
			</div>
		</div>

		<section id="course" class="flex flex-col w-full">
			<h1 class="text-2xl text-center font-medium">Find a courses that works for you</h1>
			<span class="text-lg text-center text-slate-400"
				>Whatever your background or interests are, Professional Certificates have you covered</span
			>
			<div class="flex p-5 gap-3 mx-auto">
				<course-card v-for="course in courseList" :course="course" :key="course.id" />
			</div>
		</section>

		<div class="container">
			<div class="flex gap-10 p-10 mt-5">
				<div class="flex-none relative">
					<img
						class="h-auto max-w-lg transition-all duration-300 rounded-lg cursor-pointer filter"
						src="https://static.vecteezy.com/vite/assets/find-your-path-main-b1f6179c.webp"
						alt="image description"
					/>
				</div>
				<div>
					<div>
						<h2 class="text-3xl text-teal-400 font-bold py-3">LifeLearn System</h2>
						<h5 class="py-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
							Empower Your
							<span class="text-teal-400 font-bold">School</span> With Seamless Management!
						</h5>
						<p class="">
							Transform your school's administration with our comprehensive management system,
							streamlining every aspect of school operations for unparalleled efficiency and
							success!
						</p>
					</div>
					<div class="mt-5">
						<router-link to="/systems/info">
							<el-button
								class="bg-gray-900 text-white font-bold py-4 px-10 hover:bg-gray-900 focus:bg-gray-900"
							>
								Show more
							</el-button>
						</router-link>
					</div>
				</div>
			</div>
		</div>
	</WebLayout>
</template>
