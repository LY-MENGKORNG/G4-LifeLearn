<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaymentRequest;
use App\Http\Resources\Payment\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment = Payment::list();
        $payment = PaymentResource::collection($payment);
        return response()->json([
            'success' => true,
            'data' =>$payment,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        $payment = Payment::store($request);
        return response()->json([
            'success' => true,
            'message'=> 'created successfully',
            'data' => $payment
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::find($id);
        if ($payment) {
            return response()->json($payment);
        }
        return response()->json(['message' => 'Payment not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentRequest $request, string $id)
    {
        $payment = Payment::store($request,$id);
            return response()->json([
                'success' => true,
               'message'=> 'updated successfully',
               'data' => $payment
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return ["success" => true, "Message" =>"Payment deleted successfully"];
    }
}
