<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\User;
use App\Http\Resources\Courses\CourseResource;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = Course::list();
        return response()->json([
            'success' => true,
            'message' => 'This is all your course',
            'data' => ($course),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $categoryIds = Category::pluck('id')->toArray();
        // $userIds = User::pluck('id')->toArray();
        // $requestData = $request->only('category_id', 'price', 'user_id', 'duration');

        // if (!in_array($requestData['category_id'], $categoryIds)) {
        //     return response()->json(['message' => 'Invalid category_id'], 400);
        // }
        // if (!in_array($requestData['user_id'], $userIds)) {
        //     return response()->json(['message' => 'Invalid user_id'], 400);
        // }

        // $course = Course::store($request);
        // return response()->json(['message' => 'Course created successfully', 'course' => $course], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $course = Course::find($id);
        if ($course) {
            return response()->json(['courses' => $course], 200);
        } else {
            return response()->json(['error' => 'Course not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $course = Course::find($id);
        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        $categoryIds = Category::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        $requestData = $request->only('category_id', 'price', 'user_id', 'duration');
        if (isset($requestData['category_id'], $requestData['user_id'])) {
            if (!in_array($requestData['category_id'], $categoryIds)) {
                return response()->json(['message' => 'Invalid category_id'], 400);
            }
            if (!in_array($requestData['user_id'], $userIds)) {
                return response()->json(['message' => 'Invalid user_id'], 400);
            }
        }
        $course->user_id = $requestData['user_id'];
        $course->category_id = $requestData['category_id'];
        $course->save();
        return response()->json(['message' => 'Course updated successfully', 'course' => $course], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found',
            ], 404);
        }
        $deletedCourse = $course->delete();
        if ($deletedCourse) {
            return response()->json([
                'success' => true,
                'message' => 'Course deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the Course',
            ], 500);
        }
    }
}
