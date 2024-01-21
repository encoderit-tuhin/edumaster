<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Services\BookService;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use App\Imports\LibraryBooksImport;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\BookCreateRequest;

class BookController extends Controller
{

    public function __construct(private readonly BookService $bookService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.library.books.index', [
            'books' => $this->bookService->getBookCategories(),
        ]);
    }

    public function create(): View|Factory
    {
        return view('backend.library.books.create');
    }

    public function store(BookCreateRequest $request): Redirector|RedirectResponse
    {
        $book = $this->bookService->createOrUpdateBook($request->validated());

        if (!$book) {
            return redirect('books')->with('error', _lang('Something went wrong. Book can not be submitted.'));
        }

        return redirect('books')->with('success', _lang('Book  application has been submitted.'));
    }

    public function show($id): View|Factory
    {
        $book = $this->bookService->findBookById($id);

        if (!$book) {
            return redirect('books')->with('error', _lang('Something went wrong. Book can not be show.'));
        }

        return view('backend.library.books.show', [
            'book' => $book
        ]);
    }

    public function edit($id): View|Factory
    {
        $book = $this->bookService->findBookById($id);

        if (!$book) {
            return redirect('books')->with('error', _lang('Something went wrong. Book can not be edit.'));
        }

        return view('backend.library.books.edit', [
            'book' => $book
        ]);
    }

    public function update(BookCreateRequest $request, $id): Redirector|RedirectResponse
    {
        $book = $this->bookService->findBookById($id);

        if (!$book) {
            return redirect('books')->with('error', _lang('Something went wrong. Book can not be update.'));
        }

        $this->bookService->createOrUpdateBook($request->validated(), $id);

        return redirect('books')->with('success', _lang('Information has been added'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $book = $this->bookService->deleteBookById($id);

        if (!$book) {
            return redirect('books')->with('error', _lang('Something went wrong. Book can not be delete.'));
        }

        return redirect('books')->with('success', _lang('Information has been deleted'));
    }

    public function bulkUpload(): View|Factory
    {
        return view('backend.library.books.books-bulk-upload');
    }

    public function bulkStore(Request $request)
    {
        // return $request->all();

        $request->validate([
            'xlsx_file' => 'required|mimes:xlsx,csv',
        ]);

        $file = $request->file('xlsx_file');
        $import = new LibraryBooksImport();
        Excel::import($import, $file);
        $importedData = $import->data;

        DB::beginTransaction();
        try {
            foreach ($importedData as $row) {
                $book = new Book();
                $book->date = $row['date'];
                $book->scheme_no = $row['scheme_no'];
                $book->call_no = $row['call_no'];
                $book->writer_name = $row['writer_name'];
                $book->name = $row['name'];
                $book->book_copy_no = $row['book_copy_no'];
                $book->publisher = $row['publisher'];
                $book->publish_date = $row['publish_date'];
                $book->version = $row['version'];
                $book->price = $row['price'];
                $book->supplier = $row['supplier'];
                $book->total_page = $row['total_page'];
                $book->identify_page = $row['identify_page'];
                $book->description = $row['description'];
                $book->asset_no = $row['asset_no'];
                $book->save();
            }

            DB::commit();
            return redirect('books')->with('success', _lang('Library Books Bulk upload successfully'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', _lang('Failed to insert records unsuccessfully'));
        }
    }

    public function downloadDemoFile()
    {
        $filePath = public_path('uploads/library_books_xlsx_file/library_books_demo.xlsx');

        if (file_exists($filePath)) {
            return response()->download($filePath, 'library_books_demo.xlsx', [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ]);
        }

        abort(404, 'File not found');
    }
}
