<?php

declare(strict_types=1);

namespace App\Services;

use App\StudentCategory;
use App\Repositories\StudentCategoryRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StudentCategoriesService
{
    public function __construct(
        private readonly StudentCategoryRepository $classRepository
    ) {
    }

    public function getStudentCategories(array $filter = []): LengthAwarePaginator
    {
        return $this->classRepository->paginate(20, $filter);
    }

    public function findStudentCategoryById(int $id): ?StudentCategory
    {
        return $this->classRepository->show($id);
    }

    public function createStudentCategory(array $data): ?StudentCategory
    {
        return $this->classRepository->create($data);
    }

    public function updateStudentCategory(array $data, int $id)
    {
        return $this->classRepository->update($data, $id);
    }

    public function deleteStudentCategoryById(int $id)
    {
        return $this->classRepository->delete($id);
    }
}
