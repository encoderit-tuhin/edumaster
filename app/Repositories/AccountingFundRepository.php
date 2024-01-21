<?php

declare(strict_types=1);

namespace App\Repositories;

use App\AccountingFund;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AccountingFundRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return AccountingFund::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = AccountingFund::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->orderBy('id', 'desc')->paginate($perPage);
    }

    public function create(array $data): ?AccountingFund
    {
        return AccountingFund::create($data);
    }

    public function update(array $data, int $id)
    {
        return AccountingFund::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return AccountingFund::destroy($id);
    }

    public function show(int $id)
    {
        return AccountingFund::find($id);
    }
}
