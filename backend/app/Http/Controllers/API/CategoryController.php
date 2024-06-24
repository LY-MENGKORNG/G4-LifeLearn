<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use GuzzleHttp\Psr7\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::list();
        $category = CategoryResource::collection($category);
        return response()->json(['category' => $category], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        $category = Category::store($request);
        return response()->json(['message'=> 'Category','category' => $category], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        if ($category) {
            return response()->json(['category' => $category], 200);
        } else {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::store($request, $id);
        return response()->json(['message'=> 'Category updated successfully','category' => $category], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return response()->json(['message'=> 'Category deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }
}
