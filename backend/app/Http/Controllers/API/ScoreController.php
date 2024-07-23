<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\User;
use App\Models\Subject;
use App\Models\Semester;
use App\Http\Resources\Scores\ScoreResource;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $score = Score::list();
        return response()->json([
            'success' => true,
            'message' => 'This is all your score',
            'data' => ScoreResource::collection($score),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $studentId= User::pluck('id')->toArray();
        $subjectId = Subject::pluck('id')->toArray();
        $semesterId = Semester::pluck('id')->toArray();

        $requestData =$request->only('student_id', 'subject_id', 'semester_id');
        if(isset($requestData['student_id'], $requestData['subject_id'])){
            if(!in_array($requestData['student_id'],$studentId)){
                return response()->json(['message'=> 'Invalid student_id'],400);
            }
            if(!in_array($requestData['subject_id'], $subjectId)){
                return response()->json(['message'=> 'Invalid subject_id'],400);
            }
            if(!in_array($requestData['semester_id'], $semesterId)){
                return response()->json(['message'=> 'Invalid semester_id'],400);
            }
        }
        
        $score = Score::store($request);
       
        return response()->json(['message'=>"Score created successfully", "score"=>$score]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $score = Score::find($id);
        if ($score) {
            return response()->json(['score' => $score], 200);
        } else {
            return response()->json(['message' => 'Score not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $score = Score::find($id);
        if (!$score) {
            return response()->json(['message' => 'Score not found'], 404);
        }
        $studentId= User::pluck('id')->toArray();
        $subjectId = Subject::pluck('id')->toArray();
        $semesterId = Semester::pluck('id')->toArray();
        $requestData =$request->only('student_id', 'subject_id','semester_id');
        if(isset($requestData['student_id'], $requestData['subject_id'])){
            if(!in_array($requestData['student_id'],$studentId)){
                return response()->json(['message'=> 'Invalid student_id'],400);
            }
            if(!in_array($requestData['subject_id'], $subjectId)){
                return response()->json(['message'=> 'Invalid subject_id'],400);
            }
            if(!in_array($requestData['semester_id'], $semesterId)){
                return response()->json(['message'=> 'Invalid semester_id'],400);
            }
        }
        $score->student_id = $requestData['student_id'];
        $score->subject_id = $requestData['subject_id'];
        $score->semester_id = $requestData['semester_id'];
        $score->save();
        return response()->json(['message'=>"Score updated successfully", "score"=>$score]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $score=Score::find($id);
        if (!$score) {
            return response()->json(['message' => 'Score not found'], 404);
        }
        $deletedScore = $score->delete();
        if ($deletedScore) {
            return response()->json(['message' => 'Score deleted successfully'], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the score'], 500
            );
        }
    }
}
