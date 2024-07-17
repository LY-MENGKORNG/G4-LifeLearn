<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Notificaton;
use Illuminate\Http\Request;
use App\Http\Resources\Notifications\NotificationResource;
use App\Models\User;
use App\Models\Classroom;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notification = Notificaton::list();
        return response()->json([
            'success' => true,
            'message' => 'This is all your notifications',
            'data' => NotificationResource::collection($notification)
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $notification = Notificaton::find($id);
        if ($notification) {
            return response()->json(['notification' => $notification], 200);
        } else {
            return response()->json(['message' => 'Notification not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $notification = Notificaton::find($id);
        $userIds = User::pluck('id')->toArray();
        $classroomIds = Classroom::pluck('id')->toArray();

        $requestData = $request->only('user_id', 'classroom_id');
        if (isset($requestData['user_id'], $requestData['classroom_id'])) {
            if (!in_array($requestData['user_id'], $userIds)) {
                return response()->json(['message' => 'Invalid user_id'], 400);
            }
            if (!in_array($requestData['classroom_id'], $classroomIds)) {
                return response()->json(['message' => 'Invalid classroom_id'], 400);
            }
        }
        $notification->classroom_id = $requestData['classroom_id'];
        $notification->user_id = $requestData['user_id'];
        $notification->save();
        return response()->json(['message' => 'Notification updated successfully', 'Notification' => $notification], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notification = Notificaton::find($id);
        if ($notification) {
            $notification->delete();
            return response()->json(['message'=> 'Notification deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Notification not found'], 404);
        }
        
    }
}
