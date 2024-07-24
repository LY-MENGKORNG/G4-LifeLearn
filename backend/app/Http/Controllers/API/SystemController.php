<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Systems\SystemResource;
use App\Http\Resources\Users\FrontUserResource;
use App\Models\{
    Book,
    Classes,
    Frontuser,
    Grade,
    Lesson,
    Reference,
    System,
};
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

    public function dashboard(Request $request)
    {
        $users = Frontuser::where('system_id', $request->user()->system_id)->role(['teacher', 'student'])->get();  
        $teachers = Frontuser::where('system_id', $request->user()->system_id);
        $teachers = $teachers->role('teacher')->get();

        $students = Frontuser::where('system_id', $request->user()->system_id);
        $students = $students->role('student')->get();

        $books = Book::where('system_id', $request->user()->system_id)->get();

        $grades = Grade::where('system_id', $request->user()->system_id)->get();

        $classes = Classes::where('system_id', $request->user()->system_id)->get();

        return response()->json([
            'status' => true,
            'message' => 'Contents in Dashboard',
            'data' => [
                'users' => FrontUserResource::collection($users),
                'teachers' => $teachers,
                'students' => $students,
                'grades' => $grades,
                'classes' => $classes,
                'books' => $books,

                'user_count' => $users->count(),
                'teacher_count' => $teachers->count(),
                'student_count' => $students->count(),
                'grade_count' => $grades->count(), 
                'class_count' => $classes->count(),
                'books_count' => $books->count(),
            ]
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

    public function getTeachers(Request $request)
    {
        $teachers = Frontuser::where('system_id', $request->user()->system_id);
        $teachers = $teachers->role('teacher')->get();
        return response()->json([
            'status' => true,
            'message' => 'List of teachers',
            'data' => FrontUserResource::collection($teachers)
        ], 200);
    }

    public function meterials(Request $request)
    {
        $lessons = Lesson::where('system_id', $request->user()->id)->get();
        return response()->json([
            'status' => true,
            'message' => 'List of meterials',
            'data' => [
                'lessons' => $lessons
            ]
        ], 200);
    }
}
