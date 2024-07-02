<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Favorites\MylearnRequest;
use App\Http\Resources\Favorite\MylearnReSource;
use App\Models\Favorite;
use Illuminate\Http\Request;

class MylearnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mylearn = Favorite::list();
        $mylearn = MylearnReSource::collection($mylearn);
        return response()->json(['category' => $mylearn], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MylearnRequest $request)
    {
        $mylearn = Favorite::store($request);
        return response()->json([
            'success'=> true,
            'message'=> 'add book successfully',
            'data' => $mylearn],
            200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mylearn = Favorite::find($id);
        if ($mylearn) {
            return response()->json(['category' => $mylearn], 200);
        } else {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MylearnRequest $request, string $id)
    {
        $mylearn = Favorite::store($request, $id);
        return response()->json(['message'=> 'Category updated successfully','category' => $mylearn], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mylearn = Favorite::find($id);
        if ($mylearn) {
            $mylearn->delete();
            return response()->json(['message'=> 'Category deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }
}
