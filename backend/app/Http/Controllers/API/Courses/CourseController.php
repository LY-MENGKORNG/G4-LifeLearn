<?php

namespace App\Http\Controllers\API\Courses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Resources\Courses\CourseResource;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses= Course::list();
        return response()->json([
            'success' => true,
            'data' => CourseResource::collection($courses),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $price = $request->price;
        $duration = $request->duration;
        $user_id = $request->user_id;
        $category_id = $request->category_id;
        $courses = new Course();
        $courses->price = $price;
        $courses->duration = $duration;
        $courses->user_id = $user_id;
        $courses->category_id = $category_id;
        $courses->save();
        return response()->json([
            'message' => 'Course created successfully',
            'data' => $courses
        ], 200);


     
        
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
