<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Frontuser;
use App\Models\PermissionStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permission = PermissionStudent::list();
        return response()->json(['Permissions' => $permission], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Get the authenticated user
       $user = $request->user();

       // Check if the user has the 'student' role
    //    if (!$user->hasRole('student')) {
    //        return response()->json(['error' => 'Unauthorized'], 403);
    //    }

       // Validate the request
       $validated = $request->validate([
           'purpose' => 'required|string|max:255',
           'start_date' => 'required|date',
           'end_date' => 'required|date|after_or_equal:start_date',
       ]);

       // Create a new permission for the student
       $permission = PermissionStudent::create([
           'student_id' => $user->id,
           'purpose' => $validated['purpose'],
           'start_date' => $validated['start_date'],
           'end_date' => $validated['end_date'],
       ]);

       return response()->json(['Permission' => $permission], 200);
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
