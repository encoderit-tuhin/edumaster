<?php

declare(strict_types=1);

namespace App\Services;

use App\BookCategory;
use App\Repositories\BookCategoryRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BookCategoryService
{
    public function __construct(
        private readonly BookCategoryRepository $bookCategoryRepository
    ) {
    }

    public function getBookCategories(array $filter = []): LengthAwarePaginator
    {
        return $this->bookCategoryRepository->paginate(20, $filter);
    }

    public function findBookCategoryById(int $id): ?BookCategory
    {
        return $this->bookCategoryRepository->show($id);
    }

    public function createBookCategory(array $data): ?BookCategory
    {
        return $this->bookCategoryRepository->create($data);
    }

    public function updateBookCategory(array $data, int $id)
    {
        return $this->bookCategoryRepository->update($data, $id);
    }

    public function deleteBookCategoryById(int $id)
    {
        return $this->bookCategoryRepository->delete($id);
    }
}
