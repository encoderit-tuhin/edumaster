<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Period;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PeriodRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Period::all();
    }

    public function paginate(int $perPage = 20, array $filter = []): LengthAwarePaginator
    {
        $query = Period::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?Period
    {
        return Period::create($data);
    }

    public function update(array $data, int $id)
    {
        return Period::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return Period::destroy($id);
    }

    public function show(int $id)
    {
        return Period::find($id);
    }
}
