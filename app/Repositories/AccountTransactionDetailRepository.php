<?php

declare(strict_types=1);

namespace App\Repositories;

use App\AccountTransactionDetail;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AccountTransactionDetailRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return AccountTransactionDetail::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = AccountTransactionDetail::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?AccountTransactionDetail
    {
        return AccountTransactionDetail::create($data);
    }

    public function update(array $data, int $id)
    {
        return AccountTransactionDetail::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return AccountTransactionDetail::destroy($id);
    }

    public function show(int $id)
    {
        return AccountTransactionDetail::find($id);
    }
}
