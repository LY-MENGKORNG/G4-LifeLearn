<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Event\EventShowResource;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\EventSource;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::all();
        // $event = EventShowResource::collection($event);
        return response()->json(['success' => true,'message' => 'This is all event', 'data' => $event
            ], 200);
    }

    //create a new event
    public function store(Request $request)
    {
        // Convert date format before validation
        $start_date = Carbon::createFromFormat('m/d/Y', $request->start_date)->format('Y-m-d');
        $end_date = Carbon::createFromFormat('m/d/Y', $request->end_date)->format('Y-m-d');

        // Replace the original request data with the converted dates
        $request->merge([
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);

        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required|string|max:255',
            'organizer_id' => 'required|integer|exists:users,id',
        ]);

        // Create the event
        $event = Event::create($validatedData);
        return response()->json($event, 201);
    }

    //update event
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        if ($event) {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'type' => 'required|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'location' => 'required|string|max:255',
                'organizer_id' => 'required|integer|exists:users,id',
            ]);
            $event->update($validatedData);
            return response()->json($event, 200);
        }
        return response()->json(['message' => 'event not found'], 404);
    }

    //delete event
    public function destroy($id)
    {
        $event = Event::find($id);
        if ($event) {
            $event->delete();
            return response()->json(['message' => 'event deleted successfully'], 200);
        }
        return response()->json(['message' => 'event not found'], 404);
    }
}
