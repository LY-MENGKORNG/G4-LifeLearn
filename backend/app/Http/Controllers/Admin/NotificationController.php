<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Notifications\NotificationResource;
use App\Models\Classroom;
use App\Models\Notificaton;
use App\Models\User;
use Illuminate\Contracts\View\View;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Role access|Role create|Role edit|Role delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Role add', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Role edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Role delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $notifications = NotificationResource::collection(Notificaton::list());
        return view('notification.index', ['notifications' => $notifications]);
    }
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $notification = Notificaton::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();
        $requestData = $request->only('classroom_id', 'user_id');
        $notification = Notificaton::create($request->all());
        return response()->json(['message' => 'Notification created successfully', 'notification' => $notification], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $notification = Notificaton::find($id);
        if ($notification) {
            return response()->json(['notification' => $notification], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $notification = Notificaton::find($id);
        $classrooms = Classroom::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();
        $requestData = $request->only('classroom_id', 'user_id',);
        return view('notification.index', ['notifications' => [$classrooms, $userIds, $requestData]]);
        // return response()->json(['message' => 'Notificaton updated successfully', '$notification' => $notification], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notification = Notificaton::find($id);
        if (!$notification) {
            return response()->json([
                'success' => false,
                'message' => 'notification not found',
            ], 404);
        }
        $deletedNotification = $notification->delete();
        if ($deletedNotification) {
            return response()->json([
                'success' => true,
                'message' => 'Notification deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the Notification',
            ], 500);
        }
    }
   
}
