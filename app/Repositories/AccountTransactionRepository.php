<?php

declare(strict_types=1);

namespace App\Repositories;

use App\AccountTransaction;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AccountTransactionRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return AccountTransaction::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = AccountTransaction::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?AccountTransaction
    {
        return AccountTransaction::create($data);
    }

    public function update(array $data, int $id)
    {
        return AccountTransaction::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return AccountTransaction::destroy($id);
    }

    public function show(int $id)
    {
        return AccountTransaction::find($id);
    }
}
