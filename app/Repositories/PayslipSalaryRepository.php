<?php

declare(strict_types=1);

namespace App\Repositories;

use App\PayslipSalary;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PayslipSalaryRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return PayslipSalary::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = PayslipSalary::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?PayslipSalary
    {
        return PayslipSalary::create($data);
    }

    public function update(array $data, int $id)
    {
        return PayslipSalary::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return PayslipSalary::destroy($id);
    }

    public function show(int $id)
    {
        return PayslipSalary::find($id);
    }
}
