<template>
	<WebLayout>
		<header>
			<!-- Hero section with background image, heading, subheading and button -->
			<div class="relative h-[350px] overflow-hidden">
				<img
					src="https://www.aigtechnologies.in/images/products/school-management.jpg"
					class="h-auto max-w-full"
					alt="..."
				/>
				<div
					class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-black/60 bg-fixed"
				>
					<div class="flex h-full items-center justify-center">
						<div class="px-6 text-center text-white md:px-12">
							<h1 class="mb-6 text-5xl font-bold">Finding</h1>
							<h1 class="mb-6 text-5xl font-bold">information</h1>
							<h1 class="mb-6 text-5xl font-bold">here</h1>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div class="title">
    <h3 class="mt-5 text-center text-black-400 font-bold text-2xl">
        Take the first step toward a brighter academic future
    </h3>
    <p class="text-center text-gray-400 p-3">
        Gain essential skills and earn certifications recognized by top educational institutions and
        leading companies.
    </p>
</div>
<div class="card-find p-5 flex flex-wrap gap-10 justify-center">
    <div
        class="mt-5 me-4 block rounded-lg border border-[#42b883] bg-white shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface overflow-hidden hover:shadow-md hover:transform hover:-translate-y-5 transition duration-300 ease-in-out"
        style="width: 20rem"
    >
        <div class="p-6 flex flex-wrap items-center justify-center">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 64 64"
                fill="none"
                stroke-width="1.5"
                stroke="#42b883"
                class="size-6 border border-[#42b883]"
            >
                <!-- Lightbulb Icon -->
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M32 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z"
                />
                <path stroke-linecap="round" stroke-linejoin="round" d="M30 44h4v4h-4z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M32 52v2M36 52v2M28 52v2" />

                <!-- Gear Icon -->
                <circle cx="16" cy="16" r="6" />
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M16 8v2M16 24v2M8 16h2M24 16h2M11.314 11.314l1.414 1.414M20.142 20.142l1.414 1.414M11.314 20.142l1.414-1.414M20.142 11.314l1.414-1.414"
                />

                <!-- Book Icon -->
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M48 8H36a2 2 0 0 0-2 2v44a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V10a2 2 0 0 0-2-2zM36 8v44M50 12H38M50 16H38M50 20H38M50 24H38"
                />
            </svg>

            <p class="text-base py-4 text-center">
                Gain essential skills and earn certifications recognized by top educational
                institutions.
            </p>
        </div>
        <hr class="mx-auto my-1 w-11/12 border-[#42b883]" />
        <p class="p-6 text-base text-center">
            <b class="text-[#42b883]">Course Code: 12345</b><br />Enrich your learning experience with our comprehensive
            curriculum.
        </p>
    </div>
    <div
        class="mt-5 me-4 block rounded-lg border border-[#42b883] bg-white shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface overflow-hidden hover:shadow-md hover:transform hover:-translate-y-5 transition duration-300 ease-in-out"
        style="width: 20rem"
    >
        <div class="p-6 flex flex-wrap items-center justify-center">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 64 64"
                fill="none"
                stroke-width="1.5"
                stroke="#42b883"
                class="size-6 border border-[#42b883]"
            >
                <!-- Magnifying Glass Icon -->
                <circle cx="24" cy="24" r="10" />
                <line x1="29" y1="29" x2="40" y2="40" stroke-linecap="round" stroke-linejoin="round" />

                <!-- Document Icon -->
                <rect x="40" y="12" width="12" height="16" rx="2" ry="2" />
                <line x1="42" y1="14" x2="50" y2="14" stroke-linecap="round" stroke-linejoin="round" />
                <line x1="42" y1="18" x2="50" y2="18" stroke-linecap="round" stroke-linejoin="round" />
                <line x1="42" y1="22" x2="50" y2="22" stroke-linecap="round" stroke-linejoin="round" />

                <!-- Lightbulb Icon -->
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M32 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z"
                />
                <path stroke-linecap="round" stroke-linejoin="round" d="M30 44h4v4h-4z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M32 52v2M36 52v2M28 52v2" />
            </svg>

            <p class="text-base py-4 text-center">
                Engage with supporting materials to enhance your understanding of key concepts.
            </p>
        </div>
        <hr class="mx-auto my-1 w-11/12 border-[#42b883]" />
        <p class="p-6 text-base text-center">
            <b class="text-[#42b883]">Resource ID: 12345</b><br />Explore additional resources and content to aid your
            studies.
        </p>
    </div>
    <div
        class="mt-5 me-4 block rounded-lg border border-[#42b883] bg-white shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface overflow-hidden hover:shadow-md hover:transform hover:-translate-y-5 transition duration-300 ease-in-out"
        style="width: 20rem"
    >
        <div class="p-6 flex flex-wrap items-center justify-center">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="#42b883"
                class="size-6 border border-[#42b883]"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672Zm-7.518-.267A8.25 8.25 0 1 1 20.25 10.5M8.288 14.212A5.25 5.25 0 1 1 17.25 10.5"
                />
            </svg>
            <p class="text-base py-4 text-center">
                Collaborate with peers to deepen your knowledge and achieve academic success.
            </p>
        </div>
        <hr class="mx-auto my-1 w-11/12 border-[#42b883]" />
        <p class="p-6 text-base text-center">
            <b class="text-[#42b883]">Group ID: 12345</b><br />Join study groups and participate in collaborative projects.
        </p>
    </div>
</div>


		<!-- // card -->
		<div class="title">
			<h3 class="mt-5 text-center text-black-400 font-bold text-2xl">Key elements in​ System</h3>
			<p class="text-center text-gray-400 p-3">
				Understand our school system to better clear how to provide convenience that facilitates
				your school planning.
			</p>
		</div>

		<div class="flex flex-wrap gap-5 p-5 justify-content-between">
			<div
				class="block max-w-[25rem] rounded-lg border mt-5 bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white"
			>
				<div class="relative overflow-hidden bg-cover bg-no-repeat">
					<img
						class="rounded-t-lg"
						src="https://t3.ftcdn.net/jpg/04/15/75/64/360_F_415756435_Vm6GKSJEQcQy1hIZGO04yRa0aVtSNhxi.jpg  "
						alt=""
					/>
				</div>
				<div class="p-6">
                    <h5 class="mb-2 text-xl text-start font-medium leading-tight text-[#42b883]"><b>Role</b></h5>
                    <p class="text-base text-start">
                        Take on responsibilities and tasks within an organization or project to achieve specific objectives.
                    </p>
                    <p class="text-start py-3">Great if you like:</p>
                    <div class="flex flex-wrap gap-2">
                        <button class="bg-gray-300 rounded-lg px-3 text-xs leading-tight">#Responsibility</button>
                        <button class="bg-gray-300 rounded-lg px-3 py-1 text-xs leading-tight">#Collaboration</button>
                        <button class="bg-gray-300 rounded-lg px-3 py-1 text-xs leading-tight">#Goal Achievement</button>
                    </div>
                </div>
			</div>
			<div
				class="block max-w-[25rem] rounded-lg border mt-5 bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white"
			>
				<div class="relative overflow-hidden bg-cover bg-no-repeat">
					<img
						class="rounded-t-lg"
						src="https://watermark.lovepik.com/photo/20211209/large/lovepik-image-of-a-confident-english-teacher-picture_501712498.jpg"
						alt=""
					/>
				</div>
				<div class="p-6">
					<h5 class="mb-2 text-xl text-start font-medium leading-tight text-[#42b883]">
						<b>User</b>
					</h5>
					<p class="text-base text-start">
						Engage with software and technology to achieve personal or professional objectives
						efficiently.
					</p>
					<p class="text-start py-3">Great if you like:</p>
					<div class="flex flex-wrap gap-2">
						<button class="bg-gray-300 rounded-lg px-3 text-xs leading-tight">#Technology</button>
						<button class="bg-gray-300 rounded-lg px-3 py-1 text-xs leading-tight">
							#Efficiency
						</button>
						<button class="bg-gray-300 rounded-lg px-3 py-1 text-xs leading-tight">
							#User Experience
						</button>
					</div>
				</div>
			</div>
			<div
				class="block max-w-[25rem] rounded-lg border mt-5 bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white"
			>
				<div class="relative overflow-hidden bg-cover bg-no-repeat">
					<img
						class="rounded-t-lg"
						src="https://miro.medium.com/v2/resize:fit:1100/format:webp/1*ZtVBaGkeqzTTz3uvMo8Tyg.jpeg"
						alt=""
					/>
				</div>
				<div class="p-6">
					<h5 class="mb-2 text-xl text-start font-medium leading-tight text-[#42b883]">
						<b>Permission</b>
					</h5>
					<p class="text-base text-start">
						Control and manage access to resources and information.
					</p>
					<p class="text-start py-3">Great if you like:</p>
					<div class="flex flex-wrap gap-2">
						<button class="bg-gray-300 rounded-lg px-3 text-xs leading-tight">#Security</button>
						<button class="bg-gray-300 rounded-lg px-3 py-1 text-xs leading-tight">
							#Administration
						</button>
						<button class="bg-gray-300 rounded-lg px-3 py-1 text-xs leading-tight">
							#Compliance
						</button>
					</div>
				</div>
			</div>
			<div
				class="block max-w-[25rem] rounded-lg border mt-5 bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white"
			>
				<div class="relative overflow-hidden bg-cover bg-no-repeat">
					<img
						class="rounded-t-lg"
						src="https://www.thoughtco.com/thmb/v5w7Ja1uz6WchWgbKjR_2P_wsek=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/JapaneseHighSchool-58c6b01b3df78c353c640258.jpg"
						alt=""
					/>
				</div>
				<div class="p-6">
					<h5 class="mb-2 text-xl text-start font-medium leading-tight text-[#42b883]">
						<b>System</b>
					</h5>
					<p class="text-base text-start">
						Educational institutions designed to facilitate learning and development for students.
					</p>
					<p class="text-start py-3">Great if you like:</p>
					<div class="flex flex-wrap gap-2">
						<button class="bg-gray-300 rounded-lg px-3 py-1 text-xs leading-tight">
							#Education
						</button>
						<button class="bg-gray-300 rounded-lg px-3 py-1 text-xs leading-tight">
							#Development
						</button>
						<button class="bg-gray-300 rounded-lg px-3 py-1 text-xs leading-tight">
							#Community
						</button>
					</div>
				</div>
			</div>
			<div
				class="block max-w-[25rem] rounded-lg border mt-5 bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white"
			>
				<div class="relative overflow-hidden bg-cover bg-no-repeat">
					<img
						class="rounded-t-lg"
						src="https://i.pinimg.com/564x/cc/d0/d4/ccd0d47149edc02c5783543566425b77.jpg"
						alt=""
					/>
				</div>
				<div class="p-6">
					<h5 class="mb-2 text-xl text-start font-medium leading-tight text-[#42b883]">
						<b>Notifacation</b>
					</h5>
					<p class="text-base text-start">
						Alerts or messages that inform users about important updates, events, or actions.
					</p>
					<p class="text-start py-3">Great if you like:</p>
					<div class="flex flex-wrap gap-2">
						<button class="bg-gray-300 rounded-lg px-3 text-xs leading-tight">#Communication</button>
						<button class="bg-gray-300 rounded-lg px-3 py-1 text-xs leading-tight">
							#Timeliness
						</button>
						<button class="bg-gray-300 rounded-lg px-3 py-1 text-xs leading-tight">
							#Customization
						</button>
					</div>
				</div>
			</div>
			<div
				class="block max-w-[25rem] rounded-lg border mt-5 bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white"
			>
				<div class="relative overflow-hidden bg-cover bg-no-repeat">
					<img
						class="rounded-t-lg"
						src="https://imageio.forbes.com/specials-images/imageserve/5e25ebb5a854780006cb4673/Successful-group-of-business-people-at-work-in-office/960x0.jpg?format=jpg&width=960"
						alt=""
					/>
				</div>
				<div class="p-6">
					<h5 class="mb-2 text-xl text-start font-medium leading-tight text-[#42b883]">
						<b>Setting</b>
					</h5>
					<p class="text-base text-start">
						The environment or context in which events, actions, or stories take place.
					</p>
					<p class="text-start py-3">Great if you like:</p>
					<div class="flex flex-wrap gap-2">
						<button class="bg-gray-300 rounded-lg px-3 text-xs leading-tight">#Atmosphere</button>
						<button class="bg-gray-300 rounded-lg px-3 py-1 text-xs leading-tight">#Context</button>
						<button class="bg-gray-300 rounded-lg px-3 py-1 text-xs leading-tight">
							#Immersion
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="info p-5">
			<div class="title">
				<h3 class="mt-5 text-start text-black-400 font-bold text-2xl text-[#42b883]">Information</h3>
				<p class="text-center text-gray-400 p-3">
					If you're interested in our system, please click the "Buy Now" button to make a purchase.
				</p>
				<div class="flex justify-center" v-if="connection">
					<el-button
						v-if="path == 'payment'"
						@click="handleSubmit()"
						class="bg-gray-900 text-white font-bold py-4 px-10 hover:bg-gray-900 focus:bg-gray-900"
					>
						Buy Now
					</el-button>
					<router-link v-else :to="path">
						<el-button
							class="bg-gray-900 text-white font-bold py-4 px-10 hover:bg-gray-900 focus:bg-gray-900"
						>
							Buy Now
						</el-button>
					</router-link>
					<stripe-checkout
						v-if="sessionSubId"
						mode="subscription"
						ref="checkoutSubRef"
						:pk="publishableKey"
						:session-id="sessionSubId"
					/>
				</div>
			</div>
		</div>
	</WebLayout>
</template>

 <script setup lang="ts">
import { onMounted, ref } from 'vue'
import axiosInstance from '@/plugins/axios'
import { useAuthStore } from '@/stores/auth-store'
import { StripeCheckout } from '@vue-stripe/vue-stripe'
import { ElNotification } from 'element-plus'
const store = useAuthStore()

const path = ref<string>('/request-payment')

store.user.permissions.find((per: any) => {
	path.value = per.name == 'System buy' ? 'payment' : path.value
})

const publishableKey = ref(
	'pk_test_51Pd4bxGdke5T1wEHVhR0EOEZVGmsyxpVEX0o3AwvFG1Jc4MViaxUV4ep66QmNI55YPlBRGoTxv9FNn14BWPPhutd00J6DjE2On'
)
const sessionSubId = ref<string>('')
const checkoutSubRef = ref()
const connection = ref(true)

onMounted(async () => {
	try {
		const response = await axiosInstance.get('/session')
		if (!response.data.status) {
			connectionInfo()
			return (connection.value = false)
		}
		sessionSubId.value = response.data.sub.id
	} catch (error) {
		console.log(error)
	}
})

const connectionInfo = () => {
	ElNotification({
		title: 'Warning',
		message: 'This page required internet! please check your internet connection.',
		type: 'warning'
	})
}

const handleSubmit = () => {
	checkoutSubRef.value.redirectToCheckout()
}
</script>
    