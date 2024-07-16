<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaymentRequest;
use App\Http\Resources\Payment\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function getSession()
    {
        $stripe = new \Stripe\StripeClient('sk_test_51PcXI9AXVMlmze5Z72hcOJfdH99oldMtVthsW74wVni7vR3W2qdzOkIqGX58KwPq266BXKiq4UMSmgsAceJMuXeq00oZqFHiM0');

        $checkout = $stripe->checkout->sessions->create([
            'success_url' => 'http://localhost:5173/system/login',
            'cancel_url' => 'http://localhost:5173/systems/info',
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'unit_amount' => 50,
                        'product_data' => [
                            'name' => 'LifeLean System',
                        ]
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
        ]);
        
        $sub = $stripe->checkout->sessions->create([
            'success_url' => 'http://localhost:5173/system/login',
            'cancel_url' => 'http://localhost:5173/systems/info',
            'line_items' => [
                [
                    'price' => 'price_1PcjpKAXVMlmze5ZlreJdO3G',
                    'quantity' => 1,
                ],
            ],
            'mode' => 'subscription',
        ]); 

        return ['oneTime' => $checkout, 'sub' => $sub];
    }

    public function getWebhook()
    {
        \Log::info('webhook');
        
        return response()->json([
            'message' => 'Successfully!' 
        ], 200);
    }


    public function createPaymentIntent(Request $request)
    {
        $stripeSecret = config('services.stripe.mode') === 'live'
            ? config('services.stripe.live_secret')
            : config('services.stripe.test_secret');

        Stripe::setApiKey($stripeSecret);

        $amount = $request->amount;

        $paymentIntent = PaymentIntent::create([
            'amount' => $amount * 100, // Amount in cents
            'currency' => 'usd',
        ]);

        return response()->json([
            'clientSecret' => $paymentIntent->client_secret,
        ]);
    }
}
