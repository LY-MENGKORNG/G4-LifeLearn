<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return response()->json($events, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
        ]);

        $event = Event::store($request);

        return response()->json($event, 201);
    }
    

    public function update(Request $request, $id)
    {
        $event = Event::store($request, $id);
        return response()->json($event, 200);
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
