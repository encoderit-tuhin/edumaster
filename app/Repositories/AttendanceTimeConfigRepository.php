<?php

declare(strict_types=1);

namespace App\Repositories;

use App\AttendanceTimeConfig;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AttendanceTimeConfigRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return AttendanceTimeConfig::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = AttendanceTimeConfig::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?AttendanceTimeConfig
    {
        return AttendanceTimeConfig::create($data);
    }

    public function update(array $data, int $id)
    {
        return AttendanceTimeConfig::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return AttendanceTimeConfig::destroy($id);
    }

    public function show(int $id)
    {
        return AttendanceTimeConfig::find($id);
    }
}
