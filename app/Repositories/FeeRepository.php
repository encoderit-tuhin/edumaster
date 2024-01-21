<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Fee;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FeeRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Fee::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = Fee::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?Fee
    {
        return Fee::create($data);
    }

    public function update(array $data, int $id)
    {
        return Fee::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return Fee::destroy($id);
    }

    public function show(int $id)
    {
        return Fee::find($id);
    }
}
