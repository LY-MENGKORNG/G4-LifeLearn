<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Favorites\StoreFavoriteRequest;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::all();
        return response()->json($favorites, 200);
    }
    public function show($id){
        $favorites = Favorite::find($id);
        if ($favorites) {
            return response()->json($favorites);
        }
        return response()->json(['message' => 'favorites not found'], 404);
    }
    public function store(StoreFavoriteRequest $request)
    {
        $favorites = Favorite::createOrUpdate($request);
        return response()->json(['message' => 'Favorite added', 'favorites' => $favorites], 201);
    }
    public function update(StoreFavoriteRequest $request,string $id){
        $favorites = Favorite::find($id);
        return $favorites ? response()->json([
            'success' => true,
            'message' => 'Successfully updated',
            'data' => Favorite::createOrUpdate($request, $id)
        ], 200) : response()->json([
            'success' => false,
            'message' => 'favorites not found with id ' . $id,
        ], 404);
    }
    public function destroy($id)
    {
        $favorite = Favorite::find($id);
        if ($favorite) {
            $favorite->delete();
            return response()->json(['message' => 'Favorite deleted'], 200);
        }
        return response()->json(['message' => 'Favorite not found'], 404);
    }
}
