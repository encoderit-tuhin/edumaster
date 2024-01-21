<?php

declare(strict_types=1);

namespace App\Repositories;

use App\UserLog;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserLogRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return UserLog::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = UserLog::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?UserLog
    {
        return UserLog::create($data);
    }

    public function update(array $data, int $id)
    {
        return UserLog::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return UserLog::destroy($id);
    }

    public function show(int $id)
    {
        return UserLog::find($id);
    }
}
