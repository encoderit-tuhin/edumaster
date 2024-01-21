<?php

declare(strict_types=1);

namespace App\Repositories;

use App\StudentCategory;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StudentCategoryRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return StudentCategory::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = StudentCategory::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->orderBy('id', 'desc')->paginate($perPage);
    }

    public function create(array $data): ?StudentCategory
    {
        return StudentCategory::create($data);
    }

    public function update(array $data, int $id)
    {
        return StudentCategory::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return StudentCategory::destroy($id);
    }

    public function show(int $id)
    {
        return StudentCategory::find($id);
    }
}
