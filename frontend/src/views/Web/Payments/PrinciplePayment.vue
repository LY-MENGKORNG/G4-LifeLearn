 <template>
	<div class="flex h-screen justify-center items-center bg-white">
		<div class="flex gap-3 max-w-4xl mx-auto bg-white overflow-hidden rounded-lg shadow-md">
			<div class="flex items-center justify-center gap-3 flex-col bg-green-400">
				<img class="w-64 h-72" src="../../../assets/payment-form.png" alt="" />
				<h2 class="text-white font-medium text-xl">250$ Per Month</h2>
			</div>
			<div class="flex flex-col p-6">
				<h2 class="text-xl font-semibold mb-4">Payment Information</h2>
				<form @submit.prevent="submit">
					<!-- <div class="mb-4">
						<label for="card-name" class="block text-sm font-medium text-muted-foreground"
							>Card Name</label
						>
						<el-input v-model="form.cardName" type="text" />
					</div>
					<div class="mb-4">
						<label for="card-number" class="block text-sm font-medium text-muted-foreground"
							>Card Number</label
						>
						<el-input v-model="form.cardNumber" type="text" placeholder="xxxx xxxx xxxx xxxx" />
					</div>
					<div class="flex space-x-4 mb-4">
						<div class="flex-1">
							<label for="expire-date" class="block text-sm font-medium text-muted-foreground"
								>Expire Date</label
							>
							<el-date-picker
								v-model="form.expireDate"
								type="date"
								placeholder="Pick a date"
								style="width: 100%"
							/>
						</div>
						<div class="flex-1">
							<label for="cvv" class="block text-sm font-medium text-muted-foreground">CVV</label>
							<el-input v-model="form.cvv" type="text" />
						</div>
					</div> -->
					<!-- <el-input type="number" v-model="amount"></el-input> -->

					<button
						type="submit"
						class="w-full py-2 rounded-md bg-green-400 text-white hover:bg-green-500"
					>
						Submit Payment
					</button>
				</form>
				<form @submit.prevent="submitSub">
					<button
						type="submit"
						class="w-full py-2 rounded-md bg-green-400 text-white hover:bg-green-500"
					>
						Submit SubPayment
					</button>
				</form>
				<StripeCheckout ref="checkoutRef"  :pk="publishableKey" :sessionId="oneTimeId" />
				<StripeCheckout ref="checkoutSubRef" :pk="publishableKey" :sessionId="sessionSubId" />
			</div>
		</div>
	</div>
</template>

<script setup lang="ts">
import { StripeCheckout } from '@vue-stripe/vue-stripe'
import axiosInstance from '@/plugins/axios'
import { onMounted, ref } from 'vue'

const publishableKey = process.env.STRIPE_PUBLISHABLE_KEY;
const oneTimeId = ref<string>('')
const sessionSubId = ref<string>('')
const checkoutRef = ref()
const checkoutSubRef = ref()

onMounted(() => {
	getSession()
})
const getSession = async () => {
	try {
		const response = await axiosInstance.get('/session')
		oneTimeId.value = response.data.oneTime.id
		sessionSubId.value = response.data.sub.id
		console.log(sessionSubId.value)
	} catch (error) {
		/**empty */
	}
}
const submit = () => {
	// You will be redirected to Stripe's secure checkout page
	// $ref.checkoutRef.redirectToCheckout()
	checkoutRef.value.redirectToCheckout()
}
const submitSub = () => {
	// You will be redirected to Stripe's secure checkout page
	checkoutSubRef.value.redirectToCheckout()
}
</script>