<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Waiver;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class WaiverRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Waiver::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = Waiver::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->orderBy('id', 'desc')->paginate($perPage);
    }

    public function create(array $data): ?Waiver
    {
        return Waiver::create($data);
    }

    public function update(array $data, int $id)
    {
        return Waiver::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return Waiver::destroy($id);
    }

    public function show(int $id)
    {
        return Waiver::find($id);
    }
}
