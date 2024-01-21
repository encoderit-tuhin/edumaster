<?php

declare(strict_types=1);

namespace App\Repositories;

use App\SalaryHeadUserPayroll;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SalaryHeadUserPayrollRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return SalaryHeadUserPayroll::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = SalaryHeadUserPayroll::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?SalaryHeadUserPayroll
    {
        return SalaryHeadUserPayroll::create($data);
    }

    public function update(array $data, int $id)
    {
        return SalaryHeadUserPayroll::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return SalaryHeadUserPayroll::destroy($id);
    }

    public function show(int $id)
    {
        return SalaryHeadUserPayroll::find($id);
    }
}
