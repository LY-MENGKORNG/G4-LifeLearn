<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Permission access|Permission create|Permission edit|Permission delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Permission add', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Permission edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Permission delete', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $payments = $stripe->charges->all(['limit' => 6]);
        return view('payments.index', ['payments' => $payments]);
    }
}
