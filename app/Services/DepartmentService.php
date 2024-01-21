<?php

declare(strict_types=1);

namespace App\Services;

use App\Department;
use Illuminate\Support\Str;
use App\Repositories\DepartmentRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DepartmentService
{
    public function __construct(
        private readonly DepartmentRepository $departmentRepository
    ) {
    }

    public function getDepartments(array $filter = []): LengthAwarePaginator
    {
        return $this->departmentRepository->paginate(20, $filter);
    }

    public function findDepartmentById(int $id): ?Department
    {
        return $this->departmentRepository->show($id);
    }

    public function createDepartment(array $data): ?Department
    {
        $slug = Str::slug($data['department_name']) . '-' . time();
        $priority = $data['priority'] ?? 100;
        $data['priority'] = $priority;
        $data['slug'] = $slug;

        return $this->departmentRepository->create($data);
    }


    public function updateDepartment(array $data, int $id)
    {
        return $this->departmentRepository->update($data, $id);
    }

    public function deleteDepartmentById(int $id)
    {
        return $this->departmentRepository->delete($id);
    }
}
