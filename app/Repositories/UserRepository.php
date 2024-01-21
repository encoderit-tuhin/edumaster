<?php

declare(strict_types=1);

namespace App\Repositories;

use App\User;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return User::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = User::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?User
    {
        return User::create($data);
    }

    public function update(array $data, int $id)
    {
        return User::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return User::destroy($id);
    }

    public function show(int $id)
    {
        return User::find($id);
    }
}
