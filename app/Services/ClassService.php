<?php

declare(strict_types=1);

namespace App\Services;

use App\ClassModel;
use App\Repositories\ClassModelRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ClassService
{
    public function __construct(
        private readonly ClassModelRepository $classRepository
    ) {
    }

    public function getClasses(array $filter = []): LengthAwarePaginator
    {
        return $this->classRepository->paginate(20, $filter);
    }

    public function findClassById(int $id): ?ClassModel
    {
        return $this->classRepository->show($id);
    }

    public function createClass(array $data): ?ClassModel
    {
        return $this->classRepository->create($data);
    }

    public function updateClass(array $data, int $id)
    {
        return $this->classRepository->update($data, $id);
    }

    public function deleteClassById(int $id)
    {
        return $this->classRepository->delete($id);
    }
}
