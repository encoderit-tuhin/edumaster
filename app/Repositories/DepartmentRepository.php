<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Department;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DepartmentRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Department::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = Department::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?Department
    {
        return Department::create($data);
    }

    public function update(array $data, int $id)
    {
        return Department::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return Department::destroy($id);
    }

    public function show(int $id)
    {
        return Department::find($id);
    }
}
