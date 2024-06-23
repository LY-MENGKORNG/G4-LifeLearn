<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notificaton;
use Illuminate\Http\Request;
use App\Http\Requests\Notification\NotificationRequest;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notificaton::list();

        return view('notification.index', ['notifications' => $notifications]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'classroom_id' => 'required|exists:classrooms,id',
            'user_id' => 'required|exists:users,id',
        ]);
        $notification = new Notificaton();
        $notification->classroom_id = $request->classroom_id;
        $notification->user_id = $request->user_id;
        $notification->save();
            
        return response()->json([
            'message' => 'Notification created successfully',
            'data' => $notification
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
