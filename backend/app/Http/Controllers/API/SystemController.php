<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Systems\SystemResource;
use App\Models\Reference;
use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'List of Systems',
            'data' => System::list()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**
         * 'name',
         * 'frontuser_id',
         * 'location'
         */
        $system = $request->user()->givePermissionTo('Access system');
        $request->user()->assignRole('principle');

        $reference = Reference::where('user_id', $request->user()->id)->firstOrFail();

        $school_location = $reference->school_address;
        $school_name = $reference->school_name;


        $system = System::create([
            'name' => $school_name,
            'frontuser_id' => $request->user()->id,
            'location' => $school_location,
        ]);
        return response()->json([
            'data' => $system
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $frontuser_id = $request->user()->id;
        $system = System::where('frontuser_id', $frontuser_id)->firstOrFail();
        $system = new SystemResource($system);
        return response()->json([
            'data' => $system
        ], 200);
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
