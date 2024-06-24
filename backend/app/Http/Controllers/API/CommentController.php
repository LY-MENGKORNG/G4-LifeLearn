<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Classroom;
use App\Models\Assignment;
use App\Http\Resources\Comments\CommentResource;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comment = Comment::list();
        return response()->json([
            'success' => true,
            'message' => 'This is all your comment',
            'data' => CommentResource::collection($comment),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userIds = User::pluck('id')->toArray();
        $classroomIds = Classroom::pluck('id')->toArray();
        $assignmentIds = Assignment::pluck('id')->toArray();

        $requestData = $request->only('text','user_id', 'classroom_id','assignment_id');
        if (isset($requestData['user_id'], $requestData['classroom_id'])) {
            if (!in_array($requestData['user_id'], $userIds)) {
                return response()->json(['message' => 'Invalid user_id'], 400);
            }
            if (!in_array($requestData['classroom_id'], $classroomIds)) {
                return response()->json(['message' => 'Invalid classroom_id'], 400);
            }
            if (!in_array($requestData['assignment_id'], $assignmentIds)) {
                return response()->json(['message' => 'Invalid assignment_id'], 400);
            }
        }
         $comment= Comment::store($request);
        return response()->json(['message' => 'Comment created successfully', 'comment' => $comment], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            return response()->json(['comment' => $comment], 200);
        } else {
            return response()->json(['error' => 'Comment not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        $userIds = User::pluck('id')->toArray();
        $classroomIds = Classroom::pluck('id')->toArray();
        $assignmentIds = Assignment::pluck('id')->toArray();

        $requestData = $request->only('text','user_id','classroom_id', 'assignment_id');
        if (isset($requestData['user_id'], $requestData['classroom_id'],$requestData['assignment_id'])) {
            if (!in_array($requestData['user_id'], $userIds)) {
                return response()->json(['message' => 'Invalid user_id'], 400);
            }
            if (!in_array($requestData['classroom_id'], $classroomIds)) {
                return response()->json(['message' => 'Invalid classroom_id'], 400);
            }
            if (!in_array($requestData['assignment_id'], $assignmentIds)) {
                return response()->json(['message' => 'Invalid assignment_id'], 400);
            }
        }
        $comment->user_id = $requestData['user_id'];
        $comment->assignment_id = $requestData['assignment_id'];
        $comment->save();
        return response()->json(['message' => 'Subject updated successfully', 'comment' => $comment], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json([
                'success' => false,
                'message' => 'Comment not found',
            ], 404);
        }
        $deletedComment = $comment->delete();
        if ($deletedComment) {
            return response()->json([
                'success' => true,
                'message' => 'Comment deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the comment',
            ], 500);
        }
    }
}
