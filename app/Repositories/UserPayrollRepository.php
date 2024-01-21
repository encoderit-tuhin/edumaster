<?php

declare(strict_types=1);

namespace App\Repositories;

use App\UserPayroll;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserPayrollRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return UserPayroll::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = UserPayroll::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?UserPayroll
    {
        return UserPayroll::create($data);
    }

    public function update(array $data, int $id)
    {
        return UserPayroll::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return UserPayroll::destroy($id);
    }

    public function show(int $id)
    {
        return UserPayroll::find($id);
    }
}
