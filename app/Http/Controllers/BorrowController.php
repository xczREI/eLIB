<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BorrowRecord;

class BorrowController extends Controller
{
    public function borrowBook(Request $request)
    {
        $memberId = session('current_member_id');
        $book = Book::find($request->book_id);

        if (!$book) {
            return back()->with('error', 'Book not found');
        }

        $alreadyBorrowed = BorrowRecord::where('book_id', $book->id)
            ->whereNull('returned_at')
            ->exists();

        if ($alreadyBorrowed) {
            return back()->with('error', 'Book already borrowed');
        }

        BorrowRecord::create([
            'book_id' => $book->id,
            'member_id' => $memberId,
            'borrowed_at' => now(),
            'due_date' => now()->addDays(7),
        ]);

        return back()->with('success', 'Book borrowed successfully');
    }
}

