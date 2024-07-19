<?php

namespace App\Http\Controllers\Admin;

use App\Charts\MonthlyChart;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\FrontuserController;
use App\Http\Resources\Users\FrontUserResource;
use App\Models\Calendar;
use App\Models\Frontuser;
use App\Models\Payment;
use App\Models\System;
use App\Models\User;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $systems = System::list();
        $users = Frontuser::all();
        $payments = Payment::all();
        $chart = FrontuserController::chart();

        $test = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $incomes = 0;
        foreach ($test->charges->all() as $income) {
            $incomes += $income->amount;
        }
        $incomes /= 100;
        return view('dashboard', [
            'systems' => $systems,
            'users' => $users,
            'payments' => $payments,
            'incomes' => $incomes,
            'chart' => $chart,
        ]);
    }
}
