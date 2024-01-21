<?php

declare(strict_types=1);

namespace App\Repositories;

use App\BankAccount;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BankAccountRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return BankAccount::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = BankAccount::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?BankAccount
    {
        return BankAccount::create($data);
    }

    public function update(array $data, int $id)
    {
        return BankAccount::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return BankAccount::destroy($id);
    }

    public function show(int $id)
    {
        return BankAccount::find($id);
    }
}
