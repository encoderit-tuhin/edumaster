<?php

declare(strict_types=1);

namespace App\Repositories;

use App\FeeWaiver;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FeeWaiverRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return FeeWaiver::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = FeeWaiver::query();

        return $query->orderBy('serial', 'asc')->paginate($perPage);
    }

    public function create(array $data): ?FeeWaiver
    {
        return FeeWaiver::create($data);
    }

    public function update(array $data, int $id)
    {
        return FeeWaiver::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return FeeWaiver::destroy($id);
    }

    public function show(int $id)
    {
        return FeeWaiver::find($id);
    }
}
