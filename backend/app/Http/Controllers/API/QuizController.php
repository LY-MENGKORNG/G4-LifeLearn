<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\QuizzRequest;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizze = Quiz::list();
        return response()->json([
            'success' => true,
            'Quizze' => $quizze],
             200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuizzRequest $request)
    {
        $quizze = Quiz::store($request);
        return response()->json([
            'success' => true,
            'message' => 'created successfully', 
            'Quizze' =>  $quizze],
             200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quizze = Quiz::find($id);
        return response()->json(['success' => true, 'data' => $quizze], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Quiz::store($request, $id);
        return response()->json(['success' => true, 'message' => 'updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quizzes = Quiz::find($id);
        $quizzes->delete();
        return response()->json(['success' => true, 'message' => 'delete is success'], 200);
    }
}
