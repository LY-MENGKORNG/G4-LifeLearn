<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Payment\DocumentResource;
use App\Models\Document;
use Illuminate\Http\Request;


class DocumnetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documnet = Document::list();
        $documnet = DocumentResource::collection($documnet);
        return response()->json([
            'success' => true,
            'data' =>$documnet,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $documnet = Document::store($request);
        return response()->json([
            'success' => true,
            'message'=> 'created successfully',
            'data' => $documnet
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $documnet = Document::find($id);
        if ($documnet) {
            return response()->json($documnet);
        }
        return response()->json(['message' => 'Document not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $documnet = Document::store($request,$id);
            return response()->json([
                'success' => true,
               'message'=> 'updated successfully',
               'data' => $documnet
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $documnet = Document::find($id);
        $documnet->delete();
        return ["success" => true, "Message" =>"Document deleted successfully"];
    }
}