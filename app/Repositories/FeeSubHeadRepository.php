<?php

declare(strict_types=1);

namespace App\Repositories;

use App\FeeSubHead;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FeeSubHeadRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return FeeSubHead::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = FeeSubHead::query();

        return $query->orderBy('serial', 'asc')->paginate(5000);
    }

    public function create(array $data): ?FeeSubHead
    {
        return FeeSubHead::create($data);
    }

    public function update(array $data, int $id)
    {
        return FeeSubHead::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return FeeSubHead::destroy($id);
    }

    public function show(int $id)
    {
        return FeeSubHead::find($id);
    }
}
