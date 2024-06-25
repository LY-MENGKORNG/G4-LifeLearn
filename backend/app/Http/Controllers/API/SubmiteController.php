<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Submite\SubmiteResource;
use App\Models\Assignment;
use App\Models\Submite;
use App\Models\User;
use Illuminate\Http\Request;

class SubmiteController extends Controller
{

    public function index()
    {
        $submite = Submite::all();
        $submite = SubmiteResource::collection($submite);
        return response()->json(['success' => true, 'data' => $submite], 200);
    }

    //create a new submite 
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'assignment_id' => 'nullable|integer',
        ]);
        $submite = Submite::create($request->all());
        return response()->json(['success' => true, 'message' => 'Created successfully', 'submite' => new SubmiteResource($submite)], 201);
    }

    //show submite
    public function show(string $id)
    {
        $submite = Submite::find($id);
        return response()->json(['success' => true, 'data' => $submite], 200);
    }

    //update submite
    public function update(Request $request, string $id)
    {
        $submite = Submite::find($id);
        $assignment = Assignment::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();
        $requestData = $request->only('assignment_id', 'user_id',);
        return response()->json(['message' => 'Submite updated successfully'], 200);
    }

    //delete submite
    public function destroy(string $id)
    {
        $submites = Submite::find($id);
        $submites->delete();
        return response()->json(['success' => true, 'message' => 'delete is success'], 200);
    }
}
