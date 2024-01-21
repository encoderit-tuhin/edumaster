<?php

declare(strict_types=1);

namespace App\Repositories;

use App\FeeHead;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FeeHeadRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return FeeHead::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = FeeHead::query();

        return $query->orderBy('serial', 'asc')->paginate(5000);
    }

    public function create(array $data): ?FeeHead
    {
        return FeeHead::create($data);
    }

    public function update(array $data, int $id)
    {
        return FeeHead::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return FeeHead::destroy($id);
    }

    public function show(int $id)
    {
        return FeeHead::find($id);
    }
}
