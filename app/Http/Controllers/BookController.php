<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function index()
{
    $books = Book::all(); 
    return view('books.index', ['books' => $books]);
}
function create()
    {
        return view("books.create");
    }

    function store(Request $request)
{
    $book = Book::create([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description
    ]);

    return redirect()->route('books.index');
}
function show( $book)
    {
        $book = Book::findOrFail($book);
        return view('books.show', ["book" => $book]);
    }
    function edit(Book $book)
{
    return view('books.edit', compact('book'));
}
function update(Request $request, Book $book)
{
    $book->update([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description
    ]);
    return redirect()->route('books.index');
}

public function destroy(Book $book)
{
    $book->delete();

    return redirect()->route('books.index');
}

}
