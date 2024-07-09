<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Grades\ShowGradeResource;
use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::list();
        return response()->json([
            'success' => true,
            'data' =>$grades,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $grade = Grade::store($request);
        return response()->json([
            'success' => true,
            'message'=> 'created successfully',
            'data' => $grade
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $grade = Grade::find($id);
        if ($grade) {
            return response()->json([
                'success' => true,
                'data' => new ShowGradeResource($grade)
            ], 200);
        }
        return response()->json(['message' => 'grade not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $grade = Grade::store($request,$id);
        return response()->json([
            'success' => true,
           'message'=> 'updated successfully',
           'data' => $grade
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $grade = Grade::find($id);
        $grade->delete();
        return ["success" => true, "Message" =>"grade deleted successfully"];
    }
}
