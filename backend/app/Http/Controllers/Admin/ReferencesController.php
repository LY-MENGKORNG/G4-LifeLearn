<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\ReferenceRequest;
use App\Http\Resources\Payment\ReferenceResource;
use App\Models\Reference;

class ReferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reference = Reference::list();
        $reference = ReferenceResource::collection($reference);
        return response()->json([
            'success' => true,
            'data' =>$reference,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReferenceRequest $request)
    {
        $reference = Reference::store($request);
        return response()->json([
            'success' => true,
            'message'=> 'created successfully',
            'Reference' => $reference
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reference = Reference::find($id);
        if ($reference) {
            return response()->json($reference);
        }
        return response()->json(['message' => 'Reference not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReferenceRequest $request, string $id)
    {
        $reference = Reference::store($request,$id);
            return response()->json([
                'success' => true,
               'message'=> 'updated successfully',
               'data' => $reference
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reference = Reference::find($id);
        $reference->delete();
        return ["success" => true, "Message" =>"Reference deleted successfully"];
    }
}
