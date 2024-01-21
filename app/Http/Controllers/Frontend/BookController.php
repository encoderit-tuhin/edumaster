<?php

namespace app\Http\Controllers\Frontend;

use App\Book;
use Auth;
use App\Page;
use App\Post;
use App\Mail\ContactEmail;
use App\Utilities\Overrider;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BooKController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return view(theme() . '.booklist', compact('books'));
    }
    public function search(Request $request)
    {
      
       
       $searchTerm = $request->input('search'); // Get the search term from the user input
        if ($request->ajax()) {
            if ($searchTerm == null) {
                $books = Book::orderby('name','asc')->get();
            } else {
                $books = Book::where('name', 'LIKE', "%$searchTerm%")
                    ->orWhere('code', 'LIKE', "%$searchTerm%")
                    ->orWhere('author', 'LIKE', "%$searchTerm%")
                    ->get();
            }


            return response()->json(['books' => $books]);
        }


        return view('books.index');
    }

   
}
