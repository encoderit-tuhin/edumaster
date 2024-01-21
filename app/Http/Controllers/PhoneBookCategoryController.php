<?php

namespace App\Http\Controllers;

use App\PhoneBookCategory;
use Illuminate\Http\Request;
use App\Http\Requests\PhoneBookCategoryRequest;
use App\Services\PhoneBookCategoryService;

class PhoneBookCategoryController extends Controller
{
    public function __construct(private readonly PhoneBookCategoryService $phoneBookCategoryService)
    {
    }
    public function index()
    {
        return view('backend.phone-book-category.index', [
            'phoneBookCategories' => $this->phoneBookCategoryService->getPhoneBookCategories()
        ]);
    }

    public function store(PhoneBookCategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->phoneBookCategoryService->store($request->validated());
        return redirect()->route('phone-book-category.index')->with('success', 'Phone Book Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $phoneBookCategory = $this->phoneBookCategoryService->findById($id);
        if (!$phoneBookCategory) {
            return redirect()->route('phone-book-category.index')->with('error', 'Phone Book Category Not Found');
        }
        return view('backend.phone-book-category.show', compact('phoneBookCategory'));
    }

    
    public function edit($id)
    {
        $phoneBookCategory = $this->phoneBookCategoryService->findById($id);
        if (!$phoneBookCategory) {
            return redirect()->route('phone-book-category.index')->with('error', 'Phone Book Category Not Found');
        }
        return view('backend.phone-book-category.edit', compact('phoneBookCategory'));
    }

    
    public function update(PhoneBookCategoryRequest $request,  $id)
    {
        $phoneBookCategory = $this->phoneBookCategoryService->findById($id);
        if (!$phoneBookCategory) {
            return redirect()->route('phone-book-category.index')->with('error', 'Phone Book Category Not Found');
        }
        $this->phoneBookCategoryService->update($request->validated(), $id);
        return redirect()->route('phone-book-category.index')->with('success', ' Phone Book Category Updated Successfully');
    }

   
    public function destroy($id)
    {
        $phoneBookCategory = $this->phoneBookCategoryService->findById($id);
        if (!$phoneBookCategory) {
            return redirect()->route('phone-book-category.index')->with('error', 'Phone Book Category Not Found');
        }
        $this->phoneBookCategoryService->delete($id);
        return redirect()->route('phone-book-category.index')->with('success', 'Phone Book Category Deleted Successfully');
    }
}
