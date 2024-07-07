<?php

namespace App\Http\Controllers\Admin;

use App\Charts\MonthlyChart;
use App\Http\Controllers\Controller;
use App\Http\Resources\Users\FrontUserResource;
use App\Models\Calendar;
use App\Models\Frontuser;
use App\Models\Payment;
use App\Models\System;
use App\Models\User;
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
        // $chart = UserController::showChart();
        return view('dashboard',[
            'systems' => $systems,
            'users' => $users,
            'payments' => $payments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
