<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(): View
    {
        // $books = Book::list();
        $books = BookResource::collection(Book::list());
        return view('book.index', ['books' => $books]);
    }

    public function create(): View
    {
        return view('book.new');
    }
    public function store(Request $request)
    {
        $isCreated = Book::createOrUpdate($request);
        return $isCreated ? redirect()->back()->withSuccess('Book created successfully!') : redirect()->back()->withErrors('Please fill all required fields');
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        $book = new BookResource($book);
        return view('book.show', ['book' => $book]);
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
        // return redirect()->back()-> ;
    }
}
