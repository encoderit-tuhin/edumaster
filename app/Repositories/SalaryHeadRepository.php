<?php

declare(strict_types=1);

namespace App\Repositories;

use App\SalaryHead;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SalaryHeadRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return SalaryHead::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = SalaryHead::query()->latest();
        return $query->paginate($perPage);
    }

    public function create(array $data): ?SalaryHead
    {
        return SalaryHead::create($data);
    }

    public function update(array $data, int $id)
    {
        return SalaryHead::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return SalaryHead::destroy($id);
    }

    public function show(int $id)
    {
        return SalaryHead::find($id);
    }
}
