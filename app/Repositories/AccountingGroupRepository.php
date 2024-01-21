<?php

declare(strict_types=1);

namespace App\Repositories;

use App\AccountingGroup;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AccountingGroupRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return AccountingGroup::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = AccountingGroup::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->orderBy('id', 'desc')->paginate($perPage);
    }

    public function create(array $data): ?AccountingGroup
    {
        return AccountingGroup::create($data);
    }

    public function update(array $data, int $id)
    {
        return AccountingGroup::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return AccountingGroup::destroy($id);
    }

    public function show(int $id)
    {
        return AccountingGroup::find($id);
    }
}
