<?php

declare(strict_types=1);

namespace App\Repositories;

use App\MarkDistribution;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MarkDistributionRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return MarkDistribution::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = MarkDistribution::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?MarkDistribution
    {
        return MarkDistribution::create($data);
    }

    public function update(array $data, int $id)
    {
        return MarkDistribution::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return MarkDistribution::destroy($id);
    }

    public function show(int $id)
    {
        return MarkDistribution::find($id);
    }
}
