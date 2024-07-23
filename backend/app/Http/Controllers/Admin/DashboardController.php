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
        if(!$this->isOnline()) return view('dashboard' , ['status' => false]) ;  
        $systems = System::list();
        $users = Frontuser::all();
        $payments = Payment::all();

        $test = new \Stripe\StripeClient('sk_test_51Pd4bxGdke5T1wEHlabBSPoiwmf4ptQGsA6SDDBXneGkDVhVZ4OPokSXoo6gqkKW5cTVWeR56NqrXbwLckhhI27A00QidKfyIF');

        $incomes = 0;
        foreach ($test->charges->all() as $income) {
            $incomes += $income->amount;
        }
        $incomes /= 100;
        return view('dashboard', [
            'status' => true,
            'systems' => $systems,
            'users' => $users,
            'payments' => $payments,
            'incomes' => $incomes,
        ]);
    }
}
