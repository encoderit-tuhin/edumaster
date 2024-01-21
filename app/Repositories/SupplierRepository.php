<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Interfaces\BaseRepositoryInterface;
use App\Supplier;

class SupplierRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Supplier::latest()->get();
    }
    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        return Supplier::paginate($perPage);
    }
    public function create(array $data)
    {

        return Supplier::create($data);
    }
    public function update(array $data, int $id)
    {
        return Supplier::find($id)->update($data);
    }
    public function delete(int $id)
    {
        return Supplier::destroy($id);
    }
    public function show(int $id)
    {
        return Supplier::find($id);
    }
}
