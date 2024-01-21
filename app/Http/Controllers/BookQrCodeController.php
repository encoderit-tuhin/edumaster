<?php

namespace App\Http\Controllers;

use Image;
use App\Book;
use Illuminate\Http\Request;

class BookQrCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::select('*', 'books.id AS id')->join('book_categories', 'book_categories.id', '=', 'books.category_id')->orderBy('books.id', 'DESC')->get();
        return view('backend.library.books.book-qr-code', compact('books'));
    }

    public function store(Request $request)
    {
        $bookData = [];

        if (count($request->book_ids ?? [])) {
            foreach ($request->book_ids as $bookId) {
                // Check if the user is already a moderator for the club
                $existingBook = Book::where('id', $bookId)->first();

                if ($existingBook) {
                    // Add book properties to the $bookData array
                    $bookData[] = [
                        'id'   => $existingBook->id,
                        'name' => $existingBook->name,
                        'code' => $existingBook->code,
                    ];
                }
            }
        }

        $books = Book::select('*', 'books.id AS id')->join('book_categories', 'book_categories.id', '=', 'books.category_id')->orderBy('books.id', 'DESC')->get();
        return view('backend.library.books.book-qr-code', compact('books', 'bookData'));
    }
}
