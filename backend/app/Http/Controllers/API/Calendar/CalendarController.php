<?php

namespace App\Http\Controllers\Api\Calendar;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calendar = Calendar::list();
        return response()->json(['Calendars' => $calendar], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subjectId = Calendar::pluck('id')->toArray();
        $requestData = $request->only('time', 'day', 'week', 'month', 'year', 'grade_id');

        if (!in_array($requestData['grade_id'], $subjectId)) {
            return response()->json(['message' => 'Invalid grade_id'], 400);
        }
        $calendar = Calendar::store($request);
        return response()->json(['message' => 'calendar created successfully', 'calendar' => $calendar], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $calendar = Calendar::find($id);
        if ($calendar) {
            return response()->json(['calendar' => $calendar], 200);
        } else {
            return response()->json(['error' => 'calendar not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $calendar = Calendar::find($id);
        if (!$calendar) {
            return response()->json(['message' => 'calendar not found'], 404);
        }

        $calendarIds = Calendar::pluck('id')->toArray();
        $requestData = $request->only('time', 'day', 'week', 'month', 'year', 'grade_id');
        if (isset($requestData['grade_id'])) {
            if (!in_array($requestData['grade_id'], $calendarIds)) {
                return response()->json(['message' => 'Invalid grade_id'], 400);
            }
        }
        $calendar = Calendar::store($request, $id);
        return response()->json(['message' => 'calendar updated successfully', 'calendar' => $calendar], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $calendar = Calendar::find($id);
        if ($calendar) {
            $calendar->delete();
            return response()->json(['message'=> 'calendar deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'calendar not found'], 404);
        }
    }
}
