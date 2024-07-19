<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaymentRequest;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function getSession(Request $request)
    {
        $stripe = new \Stripe\StripeClient('sk_test_51Pd4bxGdke5T1wEHlabBSPoiwmf4ptQGsA6SDDBXneGkDVhVZ4OPokSXoo6gqkKW5cTVWeR56NqrXbwLckhhI27A00QidKfyIF');
        
        $sub = $stripe->checkout->sessions->create([
            'success_url' => 'http://localhost:5173/payment/success',
            'cancel_url' => 'http://localhost:5173/systems/info',
            'line_items' => [
                [
                    'price' => 'price_1Pd4gJGdke5T1wEHXljs0PjX',
                    'quantity' => 1,
                    'product_data' => [
                        'name' => 'LifeLean System',
                        'description' => 'Complete payment to enjoy managing your school.'
                    ],
                ],
            ],
            'mode' => 'subscription',
        ]); 


        return ['sub' => $sub];
    }


    
    public function createPaymentIntent($request)
    {

    }

    public function getWebhook()
    {
        // \Log::info('webhook');
        
        return response()->json([
            'message' => 'Successfully!' 
        ], 200);
    }
}
