<?php

declare(strict_types=1);

namespace App\Repositories;

use App\PayslipSalaryHead;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PayslipSalaryHeadRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return PayslipSalaryHead::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = PayslipSalaryHead::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?PayslipSalaryHead
    {
        return PayslipSalaryHead::create($data);
    }

    public function update(array $data, int $id)
    {
        return PayslipSalaryHead::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return PayslipSalaryHead::destroy($id);
    }

    public function show(int $id)
    {
        return PayslipSalaryHead::find($id);
    }
}
