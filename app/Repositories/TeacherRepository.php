<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Teacher;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TeacherRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Teacher::all();
    }
    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = Teacher::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?Teacher
    {
        return Teacher::create($data);
    }

    public function update(array $data, int $id)
    {
        return Teacher::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return Teacher::destroy($id);
    }

    public function show(int $id)
    {
        return Teacher::find($id);
    }
}
