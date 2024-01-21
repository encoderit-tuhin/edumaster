<?php

declare(strict_types=1);

namespace App\Services;

use App\PhoneBookCategory;
use Intervention\Image\Facades\Image;
use App\Repositories\PhoneBookCategoryRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PhoneBookCategoryService
{
    public function __construct(
        private readonly PhoneBookCategoryRepository $phoneBookCategoryRepository
    ) {
    }

    public function getPhoneBookCategories()
    {
        return $this->phoneBookCategoryRepository->all();
    }

    public function store(array $data): ?PhoneBookCategory
    {
        return $this->phoneBookCategoryRepository->create($data);
    }
    public function update(array $data, $id): ?bool
    {
        return $this->phoneBookCategoryRepository->update($data, $id);
    }
    public function findById($id): ?PhoneBookCategory
    {
        return $this->phoneBookCategoryRepository->show($id);
    }
    public function delete($id): ?bool
    {
        return $this->phoneBookCategoryRepository->delete($id);
    }
}
