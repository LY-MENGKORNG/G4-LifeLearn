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
            $notification = Notificaton::all();
            $notification=NotificationResource::collection($notification);
            return response()->json([
                'success' => true,
                'message' => 'Here is the notification list',
                'data' => $notification
            ], 200);
        }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'user_id' => 'required',
            'description' => 'required',
            'receiver_id'=>'required',
        ]);
        $notifications=Notificaton::create($validatedData);
        return response()->json([
           'success' => true,
           'message' => 'Notification Created successfully',
           'data' => new NotificationResource($notifications)
        ], 201);
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
    public function update(Request $request, Notificaton $notificatons,$id)
    {
        $notificatons = Notificaton::find($id);
        if ($notificatons) {
            $validatedData = $request->validate([
                'user_id' => 'required',
                'description' => 'required',
                'receiver_id'=>'required',
            ]);
            $notificatons->update($validatedData);
            return response()->json($notificatons, 201);
        }
        return response()->json(['message' => 'notification not found'], 404);
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
