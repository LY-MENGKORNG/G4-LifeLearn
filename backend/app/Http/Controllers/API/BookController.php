<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $books =BookResource::collection($books);
        return response()->
        json([
            'success' => true,
            'message' => 'This is all books',
            'data' =>$books
        ], 200);
    }
    public function store(Request $request)
    { 
            $validatedData = $request->validate([
                'title' => 'required',
                'author' => 'required',
                'user_id' => 'required|exists:users,id',
                'published_at' => 'required',
                'price' => 'required'
            ]);

            $books = Book::create($validatedData);

            return response()->json($books, 201);
        
    }
    public function show(string $id)
    {
        $book = Book::find($id);
        return $book ? response()->json([
            'status' => true,
            'message' => 'book with id' . $id, 
            'data' => new BookResource($book)
        ]) : response()->json([
            'status' => false,
            'message' => 'book not found with id' . $id,
            'data' => false
        ]); 
    }
    public function update(Request $request, $id)
    {

        $books = Book::find($id);
        if ($books) {
            $validatedData = $request->validate([
                'title' => 'required',
                'author' => 'required',
                'user_id' => 'required|exists:users,id',
                'published_at' => 'required',
                'price' => 'required'

            ]);
            $books->update($validatedData);
            return response()->json($books, 201);
        }
        return response()->json(['message' => 'Book not found'], 404);
    }

    public function destroy($id)
    {
        $books = Book::find($id);
        if ($books) {
            $books->delete();
            return response()->json(['message' => 'books deleted successfully'], 200);
        }
        return response()->json(['message' => 'books not found'], 404);
    }
}
