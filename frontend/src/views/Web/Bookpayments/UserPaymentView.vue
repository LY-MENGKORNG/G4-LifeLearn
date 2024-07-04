<template>
    <div class="container flex justify-center">
      <div class="w-full max-w-xl">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-8 mt-8" @submit.prevent="handleSubmit">
          <div class="mb-9">
            <h1 class="text-2xl text-start text-teal-400">PAYMENT INFORMATION</h1>
            <hr class="mt-2 border-t-2 border-gray-500"/>
          </div>
          <div class="flex flex-wrap -mx-3 mb-2">
            <!-- Payment Method -->
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="block mb-2 text-sm" for="payment">Payment Method</label>
              <el-select v-model="paymentMethod" placeholder="Select Payment Method" clearable>
                <el-option label="Credit Card" value="creditCard" />
                <el-option label="PayPal" value="paypal" />
                <!-- Add more payment options as needed -->
              </el-select>
            </div>
            
            <!-- Expiration Date -->
            <div class="w-full md:w-1/2 px-3">
              <label class="block mb-2 text-sm" for="expiration">Expiration Date</label>
              <el-date-picker v-model="expirationDate" id="expiration" type="date" placeholder="Expiration Date" />
            </div>
          </div>
          
          <div class="flex flex-wrap -mx-3 mb-4">
            <!-- Card Number -->
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="block mb-2 text-sm" for="cardNumber">Card Number</label>
              <el-input v-model="cardNumber" id="card-number" type="text" placeholder="Card Number" />
            </div>
            
            <!-- Security Code -->
            <div class="w-full md:w-1/2 px-3">
              <label class="block mb-2 text-sm" for="securityCode">Security Code</label>
              <el-input v-model="securityCode" id="security" type="text" placeholder="Security Code" />
            </div>
            
            <!-- Date -->
            <div class="w-full md:w-1/2 px-3">
              <label class="block mb-2 text-sm" for="date">Date</label>
              <el-date-picker v-model="selectedDate" id="date" type="date" placeholder="Pick a date" clearable />
            </div>
            
            <!-- Amount -->
            <div class="w-full md:w-1/2 px-3">
              <label class="block mb-2 text-sm" for="amount">Amount</label>
              <el-input v-model.number="amount" id="amount" type="number" placeholder="Amount" />
            </div>
            
            <!-- Payment Method (select) -->
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="block mb-2 text-sm" for="method">Method</label>
              <el-select v-model="selectedMethod" id="method" placeholder="Select Method" clearable>
                <el-option label="ABA" value="aba" />
                <el-option label="ACILIDA" value="acilida" />
                <!-- Add more options as needed -->
              </el-select>
            </div>
          </div>
          
          <!-- Reference File Upload -->
          <div class="w-full">
            <label class="block mb-2 text-sm" for="reference">Your Reference File</label>
            <upload-file v-model="referenceFile" id="reference" />
          </div>
          
          <!-- Buttons -->
          <div class="flex items-center justify-between">
            <!-- Save Button -->
            <router-link to="">
              <el-button type="primary" native-type="submit" class="py-4 px-10 text-1.5xl">
                Save
              </el-button>
            </router-link>
            
            <!-- Cancel Button -->
            <router-link to="/system">
              <el-button class="py-4 px-10 text-1.5xl">
                Cancel
              </el-button>
            </router-link>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script setup lang="ts">
  import { ref } from 'vue';
  import { usePaymentStore } from '@/stores/calculate.ts'; // Adjust path as per your project structure
  import UploadFile from '@/Components/Common/UploadFile.vue'; // Adjust path as per your project structure
  
  // Reactive variables
  const paymentMethod = ref('');
  const expirationDate = ref('');
  const cardNumber = ref('');
  const securityCode = ref('');
  const selectedDate = ref('');
  const amount = ref(0);
  const selectedMethod = ref('');
  const referenceFile = ref('');
  
  const paymentStore = usePaymentStore();
  
  // Function to handle form submission
  const handleSubmit = () => {
    if (validateForm()) {
      // Prepare payment data
      const paymentData = {
        paymentMethod: paymentMethod.value,
        expirationDate: expirationDate.value,
        cardNumber: cardNumber.value,
        securityCode: securityCode.value,
        selectedDate: selectedDate.value,
        amount: amount.value,
        selectedMethod: selectedMethod.value,
        referenceFile: referenceFile.value,
      };
  
      // Save payment details to backend or store
      paymentStore.savePaymentDetails(paymentData);
  
      // Reset form fields
      resetForm();
    } else {
      console.error('Form validation failed. Please check your inputs.');
    }
  };
  
  // Function to validate form inputs (replace with actual validation logic)
  const validateForm = () => {
    return (
      paymentMethod.value !== '' &&
      expirationDate.value !== '' &&
      cardNumber.value !== '' &&
      securityCode.value !== '' &&
      selectedDate.value !== '' &&
      amount.value > 0 &&
      selectedMethod.value !== ''
      // Add more validation rules as needed
    );
  };
  
  // Function to reset form fields
  const resetForm = () => {
    paymentMethod.value = '';
    expirationDate.value = '';
    cardNumber.value = '';
    securityCode.value = '';
    selectedDate.value = '';
    amount.value = 0;
    selectedMethod.value = '';
    referenceFile.value = '';
  };
  
  </script>
  
  <style scoped>
  /* Add scoped styles here */
  </style>
  
  