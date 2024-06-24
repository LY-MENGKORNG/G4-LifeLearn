<?php

namespace App\Http\Controllers\Api\Assigment;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Category;
use Illuminate\Http\Request;

class AssigmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assigment = Assignment::list();
        return response()->json(['assignments' => $assigment], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $assigment = Assignment::store($request);
        return response()->json(['message'=> 'assi$assigment','assi$assigment' => $assigment], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $assigment = Assignment::find($id);
        if ($assigment) {
            return response()->json(['assigment' => $assigment], 200);
        } else {
            return response()->json(['error' => 'assigment not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $assigment = Assignment::store($request, $id);
        return response()->json(['message'=> '$assigment updated successfully','assigment' => $assigment], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assigment = Assignment::find($id);
        if ($assigment) {
            $assigment->delete();
            return response()->json(['message'=> '$assigment deleted successfully'], 200);
        } else {
            return response()->json(['error' => '$assigment not found'], 404);
        }
    }
}
