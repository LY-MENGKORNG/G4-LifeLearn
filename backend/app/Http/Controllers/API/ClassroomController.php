<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Http\Resources\Classroom\ClassroomResource;
use App\Http\Resources\Classroom\ClassroomStudentResource;
use App\Models\Frontuser;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        $classrooms = ClassroomResource::collection($classrooms);
        return response()->json($classrooms, 200);
    }
    public function store(Request $request)
    { {
            $validatedData = $request->validate([
                'grade_id' => 'required',
            ]);

            $classroom = Classroom::create($validatedData);

            return response()->json($classroom, 201);
        }
    }
    public function show($id)
    {
        $classroom = Classroom::find($id);
        if ($classroom) {
            return response()->json($classroom);
        }
        return response()->json(['message' => 'classroom not found'], 404);
    }
    public function update(Request $request, $id)
    {
        $classroom = Classroom::find($id);
        if ($classroom) {
            $classroom->update($request->all());
            return response()->json($classroom);
        }
        return response()->json(['message' => 'classroom not found'], 404);
    }
    public function destroy($id)
    {
        $classroom = Classroom::find($id);
        if ($classroom) {
            $classroom->delete();
            return response()->json(['message' => 'classroom deleted']);
        }
        return response()->json(['message' => 'classroom not found'], 404);
    }

    public function addStudents(Request $request, $classroomId)
    {
        try {
            $classroom = Classroom::findOrFail($classroomId);
            $frontuserIds = $request->input('frontuser_ids', []);
    
            // Fetch students based on IDs and role ('student')
            $students = Frontuser::whereIn('id', $frontuserIds)->role('student')->get();
    
            // Attach students to the classroom
            $classroom->frontusers()->attach($students);
    
            // Check if any students were attached
            if ($students->isEmpty()) {
                return response()->json(['message' => 'No students were added to the classroom.'], 400);
            } else {
                return response()->json(['message' => 'Students added to classroom successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to add students to classroom.'], 500);
        }
    }
    


    public function listStudents($classroomId)
    {
        $students = Classroom::find($classroomId)->frontusers;
        return response()->json([
            'success' => true,
            'data' => ClassroomStudentResource::collection($students)
        ]);
    }
    
}
