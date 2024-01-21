<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use App\Services\BookCategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\BookCategoryCreateRequest;

class BookCategoriesController extends Controller
{
    public function __construct(private readonly BookCategoryService $bookCategoryService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.library.categories.index', [
            'bookCategories' => $this->bookCategoryService->getBookCategories(),
        ]);
    }

    public function store(BookCategoryCreateRequest $request): Redirector|RedirectResponse
    {
        $bookCategory = $this->bookCategoryService->createBookCategory($request->validated());

        if (!$bookCategory) {
            return redirect('book-categories')->with('error', _lang('Something went wrong. Book Category can not be submitted.'));
        }

        return redirect('book-categories')->with('success', _lang('Book Category application has been submitted.'));
    }

    public function edit($id): View|Factory
    {
        $bookCategory = $this->bookCategoryService->findBookCategoryById($id);

        if (!$bookCategory) {
            return redirect('book-categories')->with('error', _lang('Something went wrong. Book Category can not be edit.'));
        }

        return view('backend.library.categories.edit', [
            'bookCategory' => $bookCategory
        ]);
    }

    public function update(BookCategoryCreateRequest $request, $id): Redirector|RedirectResponse
    {
        $bookCategory = $this->bookCategoryService->findBookCategoryById($id);

        if (!$bookCategory) {
            return redirect('book-categories')->with('error', _lang('Something went wrong. Book Category can not be update.'));
        }

        $this->bookCategoryService->updateBookCategory($request->validated(), $id);

        return redirect('book-categories')->with('success', _lang('Information has been added'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $bookCategory = $this->bookCategoryService->deleteBookCategoryById($id);

        if (!$bookCategory) {
            return redirect('book-categories')->with('error', _lang('Something went wrong. Book Category can not be delete.'));
        }

        return redirect('book-categories')->with('success', _lang('Information has been deleted'));
    }
}
