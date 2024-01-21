<?php

declare(strict_types=1);

namespace App\Repositories;

use App\ClassModel;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ClassModelRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return ClassModel::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = ClassModel::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->orderBy('id', 'DESC')->paginate($perPage);
    }

    public function create(array $data): ?ClassModel
    {
        return ClassModel::create($data);
    }

    public function update(array $data, int $id)
    {
        return ClassModel::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return ClassModel::destroy($id);
    }

    public function show(int $id)
    {
        return ClassModel::find($id);
    }
}
