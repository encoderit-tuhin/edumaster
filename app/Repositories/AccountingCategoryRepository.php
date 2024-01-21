<?php

declare(strict_types=1);

namespace App\Repositories;

use App\AccountingCategory;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AccountingCategoryRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return AccountingCategory::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = AccountingCategory::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->orderBy('id', 'desc')->paginate($perPage);
    }

    public function create(array $data): ?AccountingCategory
    {
        return AccountingCategory::create($data);
    }

    public function update(array $data, int $id)
    {
        return AccountingCategory::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return AccountingCategory::destroy($id);
    }

    public function show(int $id)
    {
        return AccountingCategory::find($id);
    }
}
