<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Quizze\QuizzeResource;
use App\Models\Quizze;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuizzeController extends Controller
{
    //lis all quizze
    public function index()
    {

        $quizze = Quizze::all();
        $quizze = QuizzeResource::collection($quizze);
        return response()->json(['success' => true, 'data' => $quizze], 200);
    }

    //create a new Quiz
    public function store(Request $request)
    {

        $quizze = Quizze::store($request);
        return response()->json(['success' => true, 'message' => 'created successfully', 'Quizze' =>  $quizze], 200);
    }

    //show Quiz
    public function show(string $id)
    {
        $quizze = Quizze::find($id);
        return response()->json(['success' => true, 'data' => $quizze], 200);
    }

    //update Quiz
    public function update(Request $request, string $id)
    {
        Quizze::store($request, $id);
        return response()->json(['success' => true, 'message' => 'updated successfully'], 200);
    }
    
    //delete Quiz
    public function destroy(string $id)
    {
        $quizzes = Quizze::find($id);
        $quizzes->delete();
        return response()->json(['success' => true, 'message' => 'delete is success'], 200);
    }
}
