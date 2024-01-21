<?php

declare(strict_types=1);

namespace App\Repositories;

use App\AccountingLedger;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AccountingLedgerRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return AccountingLedger::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = AccountingLedger::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->orderBy('id', 'desc')->paginate($perPage);
    }

    public function create(array $data): ?AccountingLedger
    {
        return AccountingLedger::create($data);
    }

    public function update(array $data, int $id)
    {
        return AccountingLedger::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return AccountingLedger::destroy($id);
    }

    public function show(int $id)
    {
        return AccountingLedger::find($id);
    }
}
