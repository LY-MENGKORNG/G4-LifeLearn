<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Systems\SystemResource;
use App\Http\Resources\Users\FrontUserResource;
use App\Models\Frontuser;
use App\Models\Reference;
use App\Models\System;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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
        $user = $request->user();
        $system = $user->givePermissionTo('Access system');
        $user->roles()->detach();
        $user->assignRole('principle');

        $reference = Reference::where('user_id', $user->id)->firstOrFail();

        $school_location = $reference->school_address;
        $school_name = $reference->school_name;


        $system = System::create([
            'name' => $school_name,
            'frontuser_id' => $user->id,
            'location' => $school_location,
        ]);

        $user->update(['system_id' => $system->id])->save();

        return response()->json([
            'status' => true,
            'data' => $system
        ], 200);
    }

    public function acceptInvite(Request $request)
    {
        $user = Frontuser::where('email', $request->email)->firstOrFail();
        $system = Frontuser::where('email', $request->from_mail)->firstOrFail();
        $user->roles()->detach();
        $user->assignRole('teacher');
        $user->update(['system_id' => $system->id])->save();
        return redirect()->route('http://localhost:5173/system/dashboard');
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

    public function getUsers(Request $request)
    {
        $users = Frontuser::role($request->role)->get();
        return response()->json([
            'status' => true,
            'message' => 'List of ' . $request->role,
            'data' => FrontUserResource::collection($users)
        ], 200);
    }
}
