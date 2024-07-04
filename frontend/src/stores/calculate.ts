import { defineStore } from 'pinia';

// Define the type for fee details
interface FeeDetails {
  creditCardFee: number;
  paypalFee: number;
  // Add more fees as needed
}


export const usePaymentStore = defineStore('payment', {
  state: () => ({
    paymentMethod: '',
    orderAmount: 0,
    selectedPaymentMethod: '',
    referenceFile: '',
    totalPayment: 0,
  }),

  actions: {
    calculateTotalPayment(orderAmount: number, selectedPaymentMethod: string, feeDetails: FeeDetails) {
      let totalAmount = orderAmount;
      
      // Apply fees or discounts based on payment method
      switch (selectedPaymentMethod) {
        case 'creditCard':
          totalAmount += feeDetails.creditCardFee;
          break;
        case 'paypal':
          totalAmount += feeDetails.paypalFee;
          break;
        // Add more cases as needed for other payment methods
        default:
          break;
      }

      this.totalPayment = totalAmount;
    },

    // Example action to save payment details to backend (replace with actual implementation)
    savePaymentDetails(paymentData: any) {
      console.log('Saving payment details:', paymentData);
    },
  },
});
