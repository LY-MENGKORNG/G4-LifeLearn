<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Notifications\NotificationResource;
use App\Models\Classroom;
use App\Models\Document;
use App\Models\Frontuser;
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
        $this->middleware('role_or_permission:Notification access|Notification add|Notification edit|Notification delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Notification add', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Notification edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Notification delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $notifications = Notificaton::where('status', 0)->get();
        if (count($notifications) > 0) {
            foreach ($notifications as $notification) {
                $notification['sender'] =  Frontuser::find($notification->user_id);
            }
            return view('notification.index', ['notifications' => $notifications]);
        }
        return view('notification.index', ['notifications' => false]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $notification = Notificaton::find($id);
        $notification = new NotificationResource($notification);
        if ($notification->status != 1) {

            $document = Document::where('reference_id', '=', $notification->id)->get();
            $sender = Frontuser::find($notification->user_id);
            $notification["document"] = $document;
            $notification["sender"] = $sender;
        } else {
            $notification = false;
        }


        return view('notification.show',  compact('notification'));
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
