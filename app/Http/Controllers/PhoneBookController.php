<?php

namespace App\Http\Controllers;

use App\PhoneBook;
use Illuminate\Http\Request;
use App\Services\PhoneBookService;
use App\Http\Requests\PhoneBookRequest;
use App\Services\PhoneBookCategoryService;

class PhoneBookController extends Controller
{
    public function __construct(
        private readonly PhoneBookService $phoneBookService,
        private readonly PhoneBookCategoryService $phoneBookCategoryService
    ) {
    }
    public function index()
    {
        return view('backend.phone-book.index', [
            'phoneBooks' => $this->phoneBookService->getPhoneBooks(),
            'phoneBookCategories' => $this->phoneBookCategoryService->getPhoneBookCategories()
        ]);
    }
    public function create()
    {

        return view('backend.phone-book.create', [
            'phoneBookCategories' => $this->phoneBookCategoryService->getPhoneBookCategories()
        ]);
    }


    public function store(PhoneBookRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->phoneBookService->store($request->validated());
        return redirect()->route('phone-book.index')->with('success', 'Phone Book  Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $phoneBook = $this->phoneBookService->findById($id);
        if (!$phoneBook) {
            return redirect()->route('phone-book.index')->with('error', 'Phone Book  Not Found');
        }
        return view('backend.phone-book.show', compact('phoneBook'));
    }


    public function edit($id)
    {
        $phoneBook = $this->phoneBookService->findById($id);
        $phoneBookCategories = $this->phoneBookCategoryService->getPhoneBookCategories();
        if (!$phoneBook) {
            return redirect()->route('phone-book.index')->with('error', 'Phone Book  Not Found');
        }
        return view(
            'backend.phone-book.edit',
            [
                'phoneBook' => $phoneBook,
                'phoneBookCategories' => $phoneBookCategories
            ]
        );
    }


    public function update(PhoneBookRequest $request,  $id)
    {
        $phoneBook = $this->phoneBookService->findById($id);
        if (!$phoneBook) {
            return redirect()->route('phone-book.index')->with('error', 'Phone Book  Not Found');
        }
        $this->phoneBookService->update($request->validated(), $id);
        return redirect()->route('phone-book.index')->with('success', ' Phone Book  Updated Successfully');
    }


    public function destroy($id)
    {
        $phoneBook = $this->phoneBookService->findById($id);
        if (!$phoneBook) {
            return redirect()->route('phone-book.index')->with('error', 'Phone Book  Not Found');
        }
        $this->phoneBookService->delete($id);
        return redirect()->route('phone-book.index')->with('success', 'Phone Book  Deleted Successfully');
    }
}
