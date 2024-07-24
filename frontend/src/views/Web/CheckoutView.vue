<template>
    <div>
        <stripe-checkout mode="subscription" ref="checkoutRef" :pk="publishableKey" :session-id="sessionId" />
    </div>
</template>

<script>
import axiosInstance from '@/plugins/axios';
import { StripeCheckout } from '@vue-stripe/vue-stripe';
import { ElNotification } from 'element-plus'
import { ref, reactive } from 'vue'

export default {
    components: {
        StripeCheckout,
    },
    data() {
        return {
            publishableKey: 'pk_test_51Pd4bxGdke5T1wEHVhR0EOEZVGmsyxpVEX0o3AwvFG1Jc4MViaxUV4ep66QmNI55YPlBRGoTxv9FNn14BWPPhutd00J6DjE2On',
            sessionId: null,
            connection: ref(false)
        };
    },
    mounted() {
        this.getSession()
    },
    methods: {
        connectionInfo() {
            ElNotification({
                title: 'Warning',
                message: 'This page required internet! please check your internet connection.',
                type: 'warning'
            })
        },
        async getSession() {
            await axiosInstance.get('/session')
                .then((res) => {
                    console.log(res)
                    this.sessionId = res.data.sub.id
                    this.checkout()
                }).catch((err) => {
                    console.warn(err)
                    this.connectionInfo()
                });
        },
        checkout() {
            this.$refs.checkoutRef.redirectToCheckout();
        }
    },
};
</script>