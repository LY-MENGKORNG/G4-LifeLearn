 <template>
	<div class="flex h-screen justify-center items-center bg-white">
		<div class="flex gap-3 max-w-4xl mx-auto bg-white overflow-hidden rounded-lg shadow-md">
			<div class="flex items-center justify-center gap-3 flex-col bg-green-400">
				<img class="w-64 h-72" src="../../../assets/payment-form.png" alt="" />
				<h2 class="text-white font-medium text-xl">250$ Per Month</h2>
			</div>
			<div class="flex flex-col p-6">
				<h2 class="text-xl font-semibold mb-4">Payment Information</h2>
				<form>
					<div class="mb-4">
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
							<el-input type="text" />
						</div>
					</div>
					<button class="w-full py-2 rounded-md bg-green-400 text-white hover:bg-green-500">
						Submit Payment
					</button>
				</form>
			</div>
		</div>
	</div>
</template>
<script lang="ts" setup>
import { reactive, ref } from 'vue'
import { loadStripe } from '@stripe/stripe-js';

const stripePromise = loadStripe('pk_live_51PcXI9AXVMlmze5ZMvtz97e8Pu4sZFM0HNGiaR1mEk9uclQJO0PpxHdLBGSjgkQ6UsEC2dF31VgOnW9H6E52C4va00wpvSA4fs');

	
// do not use same name with ref
const form = reactive({
	cardName: '',
	cardNumber: '',
	expireDate: '', 
})
</script>