<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Document\DocumentRequest;
use App\Http\Resources\Payment\DocumentResource;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $document = Document::list();
        $document = DocumentResource::collection($document);
        return response()->json([
            'success' => true,
            'data' =>$document,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentRequest $request)
    {
        $document = Document::store($request);
        return response()->json([
            'success' => true,
            'message'=> 'created successfully',
            'document' => $document
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $document = Document::find($id);
        if ($document) {
            return response()->json($document);
        }
        return response()->json(['message' => 'document not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentRequest $request, string $id)
    {
            $document = Document::store($request,$id);
            return response()->json([
                'success' => true,
               'message'=> 'updated successfully',
               'data' => $document
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document = Document::find($id);
        $document->delete();
        return ["success" => true, "Message" =>"document deleted successfully"];
    }
}
