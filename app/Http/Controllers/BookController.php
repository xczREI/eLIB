<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Show all books
    public function index()
    {
        // This requires a 'category' relationship defined in the Book model
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    // Show form to create a new book
    public function create()
    {
        $categories = Category::all(); //
        return view('books.create', compact('categories'));
    }

    // Store a new book
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|exists:categories,id', //
            'ISBN' => 'required|unique:books,ISBN', //
            'Title' => 'required', //
            'Author' => 'required', //
            'Quantity' => 'required|integer|min:1', //
        ]);

        Book::create([
            'category_id' => $request->category, // Links to the foreign key
            'ISBN' => $request->ISBN, //
            'Title' => $request->Title, //
            'Author' => $request->Author, //
            'Quantity' => $request->Quantity, //
            'available' => true, // Default status for new books
        ]);

        return redirect()->route('books.index')->with('success', 'Book added successfully!'); //
    }

    // Show form to edit a book
    public function edit(Book $book)
    {
        $categories = Category::all(); //
        return view('books.edit', compact('book', 'categories'));
    }

    // Update book
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'category' => 'required|exists:categories,id', //
            'ISBN' => 'required|unique:books,ISBN,' . $book->id, //
            'Title' => 'required', //
            'Author' => 'required', //
            'Quantity' => 'required|integer|min:1', //
        ]);

        $book->update([
            'category_id' => $request->category, //
            'ISBN' => $request->ISBN, //
            'Title' => $request->Title, //
            'Author' => $request->Author, //
            'Quantity' => $request->Quantity, //
        ]);

        return redirect()->route('books.index')->with('success', 'Book updated successfully!'); //
    }

    // Delete book
    public function destroy(Book $book)
    {
        $book->delete(); //
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!'); //
    }
}