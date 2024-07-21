<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BookController extends Controller
{ 
    public function index(): View 
    {
        $books = Book::list();
        return view('book.index', ['books' => $books]);
    }

    public function create(): View
    {
        return view('book.new');
    }
    public function store(Request $request)
    {

    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('book.show', ['book' => $book]); 
    }

    public function update(Request $request, string $id) 
    {

    }
    
    public function destroy() 
    {

    }

}
