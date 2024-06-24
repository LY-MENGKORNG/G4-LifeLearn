<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Classroom;
use App\Http\Resources\Subjects\SubjectResource;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subject = Subject::list();
        $subject = SubjectResource::collection($subject);

        return response()->json([
           'success' => true,
           'message' => 'This is all your subject',
            'data' => $subject
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $courseIds = Course::pluck('id')->toArray();
        $classroomIds = Classroom::pluck('id')->toArray();

        $requestData = $request->only('course_id', 'classroom_id');
        if (isset($requestData['course_id'], $requestData['classroom_id'])) {
            if (!in_array($requestData['course_id'], $courseIds)) {
                return response()->json(['message' => 'Invalid course_id'], 400);
            }
            if (!in_array($requestData['classroom_id'], $classroomIds)) {
                return response()->json(['message' => 'Invalid classroom_id'], 400);
            }
        }
         $subject= Subject::store($request);
        return response()->json(['message' => 'Subject created successfully', 'Subject' => $subject], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subject = Subject::find($id);
        if ($subject) {
            return response()->json(['subject' => $subject], 200);
        } else {
            return response()->json(['error' => 'Subject not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subject = Subject::find($id);
        if (!$subject) {
            return response()->json(['message' => 'Subject not found'], 404);
        }

        $courseIds = Course::pluck('id')->toArray();
        $classroomIds = Classroom::pluck('id')->toArray();

        $requestData = $request->only('course_id','classroom_id');
        if (isset($requestData['course_id'], $requestData['classroom_id'])) {
            if (!in_array($requestData['course_id'], $courseIds)) {
                return response()->json(['message' => 'Invalid course_id'], 400);
            }
            if (!in_array($requestData['classroom_id'], $classroomIds)) {
                return response()->json(['message' => 'Invalid classroom_id'], 400);
            }
        }
        $subject->course_id = $requestData['course_id'];
        $subject->classroom_id = $requestData['classroom_id'];
        $subject->save();
        return response()->json(['message' => 'Subject updated successfully', 'subject' => $subject], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::find($id);
        if (!$subject) {
            return response()->json([
                'success' => false,
                'message' => 'Subject not found',
            ], 404);
        }
        $deletedSubject = $subject->delete();
        if ($deletedSubject) {
            return response()->json([
                'success' => true,
                'message' => 'Subject deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the subject',
            ], 500);
        }
    }
}
