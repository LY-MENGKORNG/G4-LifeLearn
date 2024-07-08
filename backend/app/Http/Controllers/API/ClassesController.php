<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Classes;
use App\Http\Resources\Classes\ClassesResource;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $classes = Classes::all();
            $classes =ClassesResource::collection($classes);
            return response()->json([
                'success' => true,
                'message' => 'Here is the class list',
                'data' => $classes
            ], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'grade_id' => 'required',
            'name' => 'required',
        ]);
        $classes=Classes::create($validatedData);
        return response()->json([
           'success' => true,
           'message' => 'Class created successfully',
           'data' => new ClassesResource($classes)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        {
            $classes = Classes::find($id);
            if ($classes) {
                return response()->json($classes);
            }
            return response()->json(['message' => 'classes not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $classes,$id)
    {
        $classes = Classes::find($id);
        if ($classes) {
            $validatedData = $request->validate([
                'grade_id' => 'required',
                'name' => 'required',
            ]);
            $classes->update($validatedData);
            return response()->json($classes, 201);
        }
        return response()->json(['message' => 'classe not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classes,$id)
    {
        $classes = Classes::find($id);
        if ($classes) {
            $classes->delete();
            return response()->json(['message' => 'classes deleted successfully'], 200);
        }
        return response()->json(['message' => 'classes not found'], 404);
    }
}
