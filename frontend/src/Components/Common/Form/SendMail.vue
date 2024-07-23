<template>
	<TransitionRoot as="template" :show="open">
		<Dialog class="relative z-10" @close="false">
			<TransitionChild
				as="template"
				enter="ease-out duration-300"
				enter-from="opacity-0"
				enter-to="opacity-100"
				leave="ease-in duration-200"
				leave-from="opacity-100"
				leave-to="opacity-0"
			>
				<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
			</TransitionChild>

			<div class="fixed inset-0 z-10 w-screen overflow-y-auto">
				<div
					class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
				>
					<TransitionChild
						as="template"
						enter="ease-out duration-300"
						enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
						enter-to="opacity-100 translate-y-0 sm:scale-100"
						leave="ease-in duration-200"
						leave-from="opacity-100 translate-y-0 sm:scale-100"
						leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
					>
						<DialogPanel
							class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
						>
							<div>
								<div class="bg-white px-4 pb-4 pt-3 sm:p-6 sm:pb-4">
									<div class=" ">
										<div class=" ">
											<DialogTitle as="h3" class="text-xl font-semibold leading-6 text-gray-900">
												Teacher Invitatiion
											</DialogTitle>
											<div class="mt-2">
												<p class="text-lg text-gray-500">Invitation teachers into the system</p>
											</div>
											<div class="mt-3 w-full">
												<label for="email">Email</label>
												<el-input
													class="w-full"
													id="email"
													type="email"
													v-model="FORM.email"
													autocomplete="true"
												/>
											</div>
											<div class="w-full mt-2">
												<label for="subject">Subject</label>
												<el-input type="text" id="subject" v-model="FORM.subject" />
											</div>
											<div class="w-full mt-1">
												<label for="message">Message</label>
												<el-input type="textarea" id="message" v-model="FORM.message" />
											</div>
										</div>
									</div>
									<div class="flex gap-3 mt-3 justify-end">
										<el-button type="warning" @click="$emit('close')" ref="cancelButtonRef">
											Cancel
										</el-button>
										<el-button type="primary" @click="handleSubmit">Submit</el-button>
									</div>
								</div>
							</div>
						</DialogPanel>
					</TransitionChild>
				</div>
			</div>
		</Dialog>
	</TransitionRoot>
</template>
  
  <script setup lang="ts">
import { ref, reactive } from 'vue'
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { ElNotification } from 'element-plus'
import { useSystemStore } from '@/stores/system-store'

const systemStore = useSystemStore()

const FORM = ref({
	subject: '',
	email: '',
	message: ''
})

const handleSubmit = () => {
	systemStore.sendMail(FORM.value, '/invite-teacher')
	// if (!systemStore.status) return connectionInfo()
	successInfo()
}

const connectionInfo = () => {
	ElNotification({
		title: 'Warning',
		message: 'This page required internet! please check your internet connection.',
		type: 'warning'
	})
	FORM.value = {
		subject: '',
		email: '',
		message: ''
	}
	close()
}

const successInfo = () => {
	ElNotification({
		title: 'Success',
		message: 'Your email have been sent successfully',
		type: 'success'
	})
}

defineProps({
	open: {
		type: Boolean,
		default: false
	}
})
defineEmits(['open', 'close'])
</script>