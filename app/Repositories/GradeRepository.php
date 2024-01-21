<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Grade;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GradeRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Grade::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = Grade::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?Grade
    {
        return Grade::create($data);
    }

    public function update(array $data, int $id)
    {
        return Grade::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return Grade::destroy($id);
    }

    public function show(int $id)
    {
        return Grade::find($id);
    }
}
